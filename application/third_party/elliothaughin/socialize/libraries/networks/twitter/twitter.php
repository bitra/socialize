<?php

	class Twitter {
		
		private $_obj;
		
		function __construct()
		{
			$this->_obj =& get_instance();
		}
	}