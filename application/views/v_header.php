<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Go Mobility</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="<?php echo(CSS.'reset.css'); ?>">
	<link rel="stylesheet" href="<?php echo(CSS.'styles.css'); ?>">
	<link rel="stylesheet" href="<?php echo(CSS.'font.css'); ?>">
	
	<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDroY6Zm8jCQsT8W7Ztt21UAZh9bMIuL7M">
    </script>
-->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
</head>
<body>
	<header>
		<div id="logo">
			<a href="<?php echo(URL.'home'); ?>"><img src="<?php echo(IMG.'logo.png'); ?>" alt="Logo GoMobility"/></a>
		</div>
		<nav>
			<ul>
				<?php 
				$url = base_url('jeparticipe');
				echo '<li><a href="'.(URL.'home').'">Accueil</a></li>
					  <li><a href="">Le Projet</a></li>				
					  <li><a href="#">Vos exp&eacute;riences</a></li>				
					  <li><a href="'.$url.'">Je participe</a></li>';
				?>								
			</ul>
		</nav>
		<div class="clear"></div>
	</header>