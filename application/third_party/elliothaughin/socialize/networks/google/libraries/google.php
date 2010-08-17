<?php

	class Google {
		
		private $_obj = NULL;
		private $_user = NULL;
		
		function __construct()
		{
			$this->_obj =& get_instance();
			
			$this->_obj->load->config('google');
			$this->_obj->load->helper('google');
			
			$key	= $this->_obj->config->item('google_oauth_key');
			$secret = $this->_obj->config->item('google_oauth_secret');
			
			$this->_obj->load->library('socializeoauth');
			$this->_obj->socializeoauth->set_site('https://www.google.com/accounts/', $key, $secret);
			
			$this->_obj->socializeoauth->set_path('request_token_path', 'OAuthGetRequestToken');
			$this->_obj->socializeoauth->set_path('authorize_path', 	'OAuthAuthorizeToken');
			$this->_obj->socializeoauth->set_path('access_token_path', 	'OAuthGetAccessToken');
			
			$request_token = $this->_obj->socializeoauth->get_request_token();
		}
		
		public function get_user_id()
		{
			return ( empty($this->_user['id']) ) ? FALSE : $this->_user['id'];
		}
		
		public function logged_in()
		{
			return ( $this->_user === NULL ) ? FALSE : TRUE;
		}
		
		public function socialize_user()
		{
			if ( !$this->logged_in() ) return NULL;
			
			$me = $this->_user;
			
			$user = new stdClass();
			$user->name = $this->_user['username'];

			return $user;
		}
		
		public function logout()
		{
		}
		
		private function _get_cookie()
		{
		}
	}