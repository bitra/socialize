<?php

	// TODO
	// Abstract this to just call the methods of the networks available to it.
	// 

	function socialize_helper_run($method, $return = FALSE)
	{
		$ci =& get_instance();
		
		$networks = $ci->socializenetworks->networks();
		
		$return_string = '';
		
		foreach ( $networks as $network )
		{
			$method = $network.'_'.$method;
			
			if ( function_exists($method) )
			{
				if ( $return === TRUE )
				{
					$return_string .= $method();
				}
				else
				{
					echo $method();
				}
			}
		}
		
		if ( $return === TRUE )
		{
			return $return_string;
		}
	}

	function socialize_xmlns($return = FALSE)
	{
		return socialize_helper_run('xmlns', $return);
	}
	
	function socialize_head($return = FALSE)
	{
		return socialize_helper_run('head', $return);
	}
	
	function socialize_footer($return = FALSE)
	{
		return socialize_helper_run('footer', $return);
	}
	
	function socialize_login_buttons()
	{
		$ci =& get_instance();
		$networks = $ci->socializenetworks->networks();
		
		echo '<ul class="socialize_login">';
		
		foreach ( $networks as $network )
		{
			$method = $network.'_login_button';
			echo '<li>'.$method().'</li>';
		}
		
		echo '</ul>';
	}