<?php

	function google_head()
	{
		$return = '';
		$return .= '<script type="text/javascript" src="http://www.google.com/jsapi"></script>';
		$return .= '<script type="text/javascript">google.load("friendconnect", "0.8");</script>';
		
		return $return;
	}
	
	function google_footer()
	{
		$ci =& get_instance();
		
		$return = '';
		
		$return .= '<script type="text/javascript">$(document).ready(function(){';
			$return .= 'google.friendconnect.container.setParentUrl("/");google.friendconnect.container.initOpenSocialApi({site: "'.$ci->config->item('google_site_id').'",onload: function(securityToken) {}});';
		$return .= '});</script>';
		
		return $return;
	}
	
	function google_login_button()
	{
		return '<a href="#" onclick="google.friendconnect.requestSignIn();">Sign in with Google</a>';
	}