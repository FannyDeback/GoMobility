<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Go Mobility</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="<?php echo css_url('reset'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('styles'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('medias'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('font'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('bootstrap.min'); ?>">

	<script type="text/javascript" src="<?php echo js_url('jquery-min') ?>"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDroY6Zm8jCQsT8W7Ztt21UAZh9bMIuL7M">
    </script>
	<script type="text/javascript" src="<?php echo js_url('bootstrap.min') ?>"></script>
</head>
<body>
	<header>
		<div id="logo">
			<a href="<?php echo base_url('admin'); ?>"><?php echo image('logo.png', 'Logo GoMobility'); ?></a>
		</div>
		<nav>
		</nav>
		<div class="clear"></div>
	</header>

	<div id="content">
		<?php echo $output; ?>
	</div>

	<div id="copyright">
		© 2014 GO MOBILITY | <a href="<?php echo base_url('home'); ?>">Retour au site</a>
	</div>
</body>
</html>
