<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"<?php socialize_xmlns()?>>
	<head>
		<title>Conforming XHTML 1.0 Strict Template</title>
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<?php socialize_head();?>
	</head>
	<body>
		<h1>Hi there</h1>
		
		<?php var_dump($this->socializeauth->user());?>
		
		<?php if ( !$this->socializeauth->connected('facebook') ):?>
			<?=facebook_login_button()?>
		<?php endif;?>
		<?php if ( $this->socializeauth->logged_in() ):?>
			<a class="logout" href="<?=site_url('welcome/logout')?>">Logout</a>
		<?php endif;?>
		<?php socialize_footer();?>
	</body>
</html>