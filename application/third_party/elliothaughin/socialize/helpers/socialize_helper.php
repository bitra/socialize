<?php

	// TODO
	// Abstract this to just call the methods of the networks available to it.
	// 

	function socialize_layout_run($method, $return = FALSE)
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
	
	function socialize_layout($key, $return = FALSE)
	{
		$method = 'socialize_layout_'.$key;
		
		if ( function_exists($method) )
		{
			return $method();
		}
		else
		{
			return socialize_layout_run($key, $return);
		}
	}
	
	function socialize_layout_login_buttons()
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