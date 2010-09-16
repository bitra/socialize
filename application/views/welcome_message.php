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
		
		<div id="content">
			<h1>Here is a newspaper site!</h1>
		
			<div id="news">
				<?php for ( $i = 0; $i < 5; $i++ ):?>
				<div class="news_item" id="news_<?=$i?>">
					<h2><a class="share-url share-title" href="<?php echo site_url('articles/'.$i)?>">This is a <?=$i?> Title!!</a></h2>
					<p class="share-body">This is the body for <?=$i?></p>
					<img class="share-image" src="http://www.realworldimage.com/images/photos_med/marijuana-grow-op-vancouver-illegal-pot-joints-cannabis-drugs-cities-abstract-lifestyles-men-people-editorial-news_14339.jpg" />
					<p><a href="#" class="share" rel="#news_<?=$i?>">Share This</a></p>
				</div>
				<?php endfor;?>
			</div>
			
			<script type="text/javascript">
			$(document).ready(function(){
				$('#news').masonry({
				  columnWidth: 180, 
				  itemSelector: '.news_item' 
				});
			});
			</script>
			
			<style type="text/css">
			.news_item {
				padding: 10px;
				border: 1px solid #CCC;
				margin-bottom: 10px;
			}
			.news_item img {
				width: 160px;
			}
			</style>
		</div>
	</div>
	<?php socialize_layout('footer');?>
	</body>
</html>