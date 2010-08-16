<?php

	class Twitter {
		
		private $_obj = NULL;
		private $_user = NULL;
		private $_twitter_cookie_key = 'twitter_anywhere_identity';
		
		function __construct()
		{
			$this->_obj =& get_instance();
			
			$this->_obj->load->config('twitter');
			$this->_obj->load->helper('twitter');
			
			$this->_get_cookie();
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
			setcookie($this->_twitter_cookie_key);
		}
		
		private function _get_cookie()
		{
			if ( !isset($_COOKIE[$this->_twitter_cookie_key]) ) return NULL;
			
			$cookie = $_COOKIE[$this->_twitter_cookie_key];
			
			$parts = explode(':', $cookie);
			if ( count($parts) !== 2 ) return NULL;
			
			$user_id = $parts[0];
			$hash = $parts[1];
			
			// Todo calculate and double check digest
			// Digest::SHA1.hexdigest(user_id + consumer_secret)
			
			if ( empty($user_id) ) return NULL;
			
			$this->_user = 	array(
								'id' => $user_id,
								'username' => strtolower('elliothaughin')
							);
			
			return TRUE;
		}
	}