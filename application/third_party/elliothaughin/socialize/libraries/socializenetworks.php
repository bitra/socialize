<?php

	class SocializeNetworks {
		
		private $_obj;
		private $_networks = array('facebook','twitter');
		
		function __construct()
		{
			$this->_obj =& get_instance();
			
			$this->_autoload();
		}
		
		function _autoload()
		{
			foreach ( $this->_networks as $network )
			{
				$this->_obj->load->library('networks/'.$network.'/'.$network);
				
				if ( $this->_obj->$network->logged_in() )
				{
					$this->_obj->socializeauth->network_login($network, $this->_obj->$network->get_user_id());
				}
			}
		}
	}