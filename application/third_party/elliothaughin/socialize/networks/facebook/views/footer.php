<div id="fb-root"></div>;
<script src="http://connect.facebook.net/en_US/all.js" type="text/javascript"></script>
<script type="text/javascript">
	FB.init({appId: '".facebook_app_id()."', status: true, cookie: true, xfbml: true});
	FB.Event.subscribe('auth.login', function(response) {
		window.location.reload();
	});
</script>

<?php if ( $this->socializeauth->connected('facebook') ):?>
<script type="text/javascript">
	$(document).ready(function(){
		$('a.logout').click(function(){
			var next = $(this).attr('href');
			FB.logout(function(response){
				window.location.href = next;
				return true;
			});
			return false;
		});
	});
</script>
<?php endif;?>