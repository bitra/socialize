<?php

	class Yahoo {
		
		private $_obj = NULL;
		private $_user = NULL;
		
		function __construct()
		{
			$this->_obj =& get_instance();
			
			$this->_obj->load->config('yahoo');
			$this->_obj->load->helper('yahoo');
			
			$key	= $this->_obj->config->item('yahoo_oauth_key');
			$secret = $this->_obj->config->item('yahoo_oauth_secret');
			
			
			var_dump($key);
			var_dump($secret);
			
			
			$this->_obj->load->library('socializeoauth');
			$this->_obj->socializeoauth->set_site('https://api.login.yahoo.com/oauth/v2/', $key, $secret);
			
			$this->_obj->socializeoauth->set_path('request_token_path', 'get_request_token');
			$this->_obj->socializeoauth->set_path('authorize_path', 	'request_auth');
			$this->_obj->socializeoauth->set_path('access_token_path', 	'get_token');
			
			$request_token = $this->_obj->socializeoauth->get_request_token();
			
			var_dump($request_token);
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