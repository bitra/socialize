<?php

	class Twitter {
		
		private $_obj = NULL;
		private $_user = NULL;
		
		function __construct()
		{
			$this->_obj =& get_instance();
			
			$this->_obj->load->config('networks/twitter');
			$this->_obj->load->helper('networks/twitter');
		}
		
		public function logged_in()
		{
			return FALSE;
		}
		
		public function socialize_user()
		{
			return $this->_user;
		}
	}