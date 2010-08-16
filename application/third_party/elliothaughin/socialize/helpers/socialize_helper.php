<?php

	// TODO
	// Abstract this to just call the methods of the networks available to it.
	// 

	function socialize_xmlns()
	{
		echo facebook_xmlns();
	}
	
	function socialize_head()
	{
		echo facebook_opengraph_meta();
	}
	
	function socialize_footer()
	{
		echo facebook_footer();
	}
	
	function socialize_login_buttons()
	{
		echo '<ul class="socialize_login">';
		echo '<li>'.facebook_login_button().'</li>';
		echo '<li>'.twitter_login_button().'</li>';
		echo '</ul>';
	}