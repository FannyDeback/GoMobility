<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Go Mobility</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="<?php echo css_url('reset'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('styles'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('font'); ?>">

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDroY6Zm8jCQsT8W7Ztt21UAZh9bMIuL7M">
    </script>
</head>
<body>
	<header>
		<div id="logo">
			<a href="<?php echo base_url('home'); ?>"><?php echo image('logo.png', 'Logo GoMobility'); ?></a>
		</div>
		<nav>
			<ul>
				<?php 
				$url = base_url('jeparticipe');
				echo '<li><a href="'. base_url('home') . '">Accueil</a></li>
					  <li><a href="">Le Projet</a></li>				
					  <li><a href="#">Vos exp&eacute;riences</a></li>				
					  <li><a href="'.$url.'">Je participe</a></li>';
				?>								
			</ul>
		</nav>
		<div class="clear"></div>
	</header>
