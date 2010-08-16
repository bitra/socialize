<?php

	class SocializeConnection {
		
		private $_obj;
		
		function __construct()
		{
			$this->_obj =& get_instance();
		}
	}