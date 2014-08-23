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

	<div id="content">
		<?php echo $output; ?>

		<aside>
			<section class="nombre-ecoacteur">
				<p><?php echo $act; ?></p>
			</section>


			<section>
				<?php echo '<a href="' . base_url('meilleur_eco_acteur') . '">Meilleur eco-acteur</a><br />
				<a href="' . base_url('jeu') . '">Description du jeu</a>'; ?>
			</section>

			<section class="appli-mobile">
				<?php echo image('appli-mobile.gif'); ?>
				<a href="#" id="appli-mobile">
					Télécharger<br/>
					<span class="f15 light">L'application Mobile</span>
				</a>
			</section>

			<section class="derniere-actualite">
				<h1><strong>Dernière</strong> actualité</h1>
				<?php echo image('img-actualite.jpg'); ?>
				<h3><a href="#"><strong>Plus</strong> d'infos</a></h3>
				<footer>
					Titre acutalité
				</footer>
			</section> 

			<section class="facebook">
				<a href="#">
				<?php echo image('bouton-facebook.png') ?>
				</a>
			</section>
		</aside>
		<div class="clear"></div>

	</div>

	<footer>
		<ul>
			<li><strong>© 2014 GO MOBILITY</strong></li>
			<li><a href="#">Mentions l&eacute;gales</a></li>
			<li><a href="#">CGV</a></li>
			<li><a href="#">Contact</a></li>
		</ul>

		<div id="logos-partenaires">
			<?php echo image('logo-ardeche.gif'); ?>
			<?php echo image('logo-ardeche-2.gif'); ?>
		</div>
		<div class="clear"></div>

	</footer>
</body>
</html>