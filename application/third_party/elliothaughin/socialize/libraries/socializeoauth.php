<?php

	include(APPPATH.'third_party/elliothaughin/socialize/libraries/oauth'.EXT);
	
	class SocializeOauth extends Oauth {
		
		function __construct()
		{
			parent::__construct();
		}
		
		function set_path($path, $value)
		{
			$paths = array('request_token_path', 'access_token_path', 'authorize_path');
			if ( !in_array($path, $paths) ) return NULL;
			
			$this->$path = $value;
		}
		
		function set_additional_param($key, $value)
		{
			$this->additional_params[$key] = $value;
			
			var_dump($this->additional_params);
		}
		
	}