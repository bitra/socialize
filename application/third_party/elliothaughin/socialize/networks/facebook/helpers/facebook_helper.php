<?php

	function facebook_xmlns()
	{
		return 'xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/"';
	}
	
	function facebook_app_id()
	{
		$ci =& get_instance();
		
		return $ci->config->item('facebook_app_id');
	}
	
	function facebook_picture($who = 'me')
	{
		$ci =& get_instance();

		$img = $ci->facebook->get_domain_url('graph').$who.'/picture';

		$cookie = $ci->facebook->get_cookie();
		
		if ( !empty($cookie['access_token']) )
		{
			$img .= '?access_token='.$cookie['access_token'];
		}
		
		return $img;
	}
	
	function facebook_opengraph_meta()
	{
		$ci =& get_instance();
		
		$return = '<meta property="fb:admins" content="'.$ci->config->item('facebook_admins').'" />';
		$return .= "\n";
		$return .= '<meta property="fb:app_id" content="'.$ci->config->item('facebook_app_id').'" />';
		$return .= "\n";
		$return .= '<meta property="og:site_name" content="'.$ci->config->item('facebook_site_name').'" />';
		$return .= "\n";	 
		
		if ( empty($ci->load->_ci_cached_vars['opengraph']) ) return $return;
		
		foreach ( $ci->load->_ci_cached_vars['opengraph'] as $key => $value )
		{
			$return .= '<meta property="og:'.$key.'" content="'.$value.'" />';
			$return .= "\n";
		}
		
		return $return;
	}
	
	function facebook_footer()
	{
		$return = '<div id="fb-root"></div>';
		$return .= "\n";
		$return .= '<script src="http://connect.facebook.net/en_US/all.js" type="text/javascript"></script>';
		$return .= "\n";
		$return .= '<script type="text/javascript">';
		$return .= "\n";
		$return .= "	FB.init({appId: '".facebook_app_id()."', status: true, cookie: true, xfbml: true});";
		$return .= "\n";
		$return .= "	FB.Event.subscribe('auth.login', function(response) {";
		$return .= "\n";
		$return .= "		window.location.reload();";
		$return .= "\n";
		$return .= "	});";
		$return .= "\n";
		$return .= '</script>';
		$return .= "\n";
		
		$ci =& get_instance();
		
		if ( $ci->socializeauth->connected('facebook') )
		{
			$return .= "<script type='text/javascript'>$(document).ready(function(){ $('a.logout').click(function(){ var next = $(this).attr('href'); FB.logout(function(response){ window.location.href = next; return true; }); return false; });});</script>";
		}
		
		return $return;
	}
	
	function facebook_login_button()
	{
		return '<fb:login-button v="2" autologoutlink="true" size="large" perms="email"><fb:intl>Login with Facebook</fb:intl></fb:login-button>';
	}