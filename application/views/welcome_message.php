<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"<?php socialize_layout('xmlns')?>>
	<head>
		<title>Socialize Demo</title>
		
		<style type="text/css">
			
			body {
				font-family: 'Lucida Grande', 'Helvetica', arial, sans-serif;
				font-size: 14px;
				background: #272727;
			}
			
			h1 { margin-top: 0 }
			
			div#doc {
				width: 1000px;
				margin: 100px auto 0 auto;
				background: #FFF;
				padding: 10px 20px 20px 20px;
			}
			
			div.account {
				float: right;
			}
			
			.socialize_login {
				list-style: none;
			}
			
			.socialize_login li {
				margin: 5px 0;
			}
			
		</style>
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<?php socialize_layout('head');?>
	</head>
	<body>
	<div id="doc">
		
		<div class="account">
			<?php if ( !$this->socializeauth->logged_in() ):?>
				<?php socialize_layout('login_buttons');?>
			<?php else:?>
				<?php $user = $this->socializeauth->user();?>
				<h3>Logged in as:<?=$user->name?> (User id #<?=$user->user_id?>)</h3>
				<a class="logout" href="<?=site_url('welcome/logout')?>">Logout</a>
			<?php endif;?>
		</div>
	
		<h1>Socialize</h1>
		<h2>Demo Application</h2>

			
		Hover over this username: <span class="socialize-name socialize-name-twitter">elliothaughin</span>
	</div>
	<?php socialize_layout('footer');?>
	</body>
</html>