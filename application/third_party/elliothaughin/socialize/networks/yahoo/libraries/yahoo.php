<?php

	class Yahoo {
		
		private $_obj = NULL;
		private $_user = NULL;
		
		function __construct()
		{
			$this->_obj =& get_instance();
			
			$this->_obj->load->config('yahoo');
			$this->_obj->load->helper('yahoo');
			
			$this->_obj->load->library('socializeoauth');
			$this->_obj->socializeoauth->set_site('https://api.login.yahoo.com/oauth/v2/');
			
			//$this->_obj->oauth->set_path('get_request_token', '');
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