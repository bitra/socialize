<?php

	function socialize_xmlns()
	{
		echo facebook_xmlns();
	}
	
	function socialize_head()
	{
		$ci =& get_instance();

		echo facebook_opengraph_meta();
	}
	
	function socialize_footer()
	{
		$ci =& get_instance();
		
		echo facebook_footer();
		
		if ( $ci->socializeauth->connected('facebook') )
		{
			echo "<script type='text/javascript'>$(document).ready(function(){ $('a.logout').click(function(){ var next = $(this).attr('href'); FB.logout(function(response){ window.location.href = next; return true; }); return false; });});</script>";
		}
	}