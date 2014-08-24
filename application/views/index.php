<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Go Mobility</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="<?php echo css_url('reset'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('styles'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('font'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('rrssb'); ?>">

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDroY6Zm8jCQsT8W7Ztt21UAZh9bMIuL7M"></script>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<script type="text/javascript" src="<?php echo js_url('bootstrap') ?>"></script>
	<script type="text/javascript" src="<?php echo js_url('rrssb.min') ?>"></script>
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
				echo '<li><a href="' . base_url('home') . '">Accueil</a></li>
					  <li><a href="' .base_url('projet'). '">Le Projet</a></li>
					  <li><a href="' .base_url('experiences'). '">Vos exp&eacute;riences</a></li>
					  <li><a href="' .$url. '">Je participe</a></li>';
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
				<?php
				$url = base_url("experience"); 
				echo '<a href="'.$url.'/'.$best->id.'" id="meilleur-eco-acteur">Meilleur eco-acteur</a>
				<a href="' . base_url('jeu') . '" id="description-jeu-concours"><strong>Description</strong> du jeu</a>'; ?>
			</section>

			<section class="appli-mobile">
				<?php echo'<a href="' . base_url('application_mobile') . '" id="appli-mobile">Télécharger<br/>
							<span class="f15 light">L\'application Mobile</span></a>';?>
			</section>

			<section class="derniere-actualite">
				<h1><strong>Dernière</strong> actualité</h1>

				<?php echo image('img-actualite.jpg');
				if (isset($actu))
				{
				echo '<h3><a href="'.base_url('actualite').'/'.$actu->id.'"><strong>Plus</strong> d`\'infos</a></h3>
					  <div class="clear"></div>';
				?>
				<footer>
					<?php echo character_limiter($actu->titre, 30); ?>
				</footer>
				<?php } ?>
			</section> 
			<!-- BOUTONS SOCIAL TAGS -->
			<ul class="rrssb-buttons clearfix">
				<li class="facebook">
					<a href="https://www.facebook.com/sharer/sharer.php?u=http://kurtnoble.com/labs/rrssb/index.html" class="popup">
						<span class="icon">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
							<path d="M27.825,4.783c0-2.427-2.182-4.608-4.608-4.608H4.783c-2.422,0-4.608,2.182-4.608,4.608v18.434
							c0,2.427,2.181,4.608,4.608,4.608H14V17.379h-3.379v-4.608H14v-1.795c0-3.089,2.335-5.885,5.192-5.885h3.718v4.608h-3.726
							c-0.408,0-0.884,0.492-0.884,1.236v1.836h4.609v4.608h-4.609v10.446h4.916c2.422,0,4.608-2.188,4.608-4.608V4.783z"/>
							</svg>
						</span>
						<span class="text">facebook</span>
					</a>
				</li>
				<li class="googleplus">
					<!-- Replace href with your meta and URL information.  -->
					<a href="https://plus.google.com/share?url=Check%20out%20how%20ridiculously%20responsive%20these%20social%20buttons%20are%20http://kurtnoble.com/labs/rrssb/index.html" class="popup">
						<span class="icon">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
								<g>
									<g>
										<path d="M14.703,15.854l-1.219-0.948c-0.372-0.308-0.88-0.715-0.88-1.459c0-0.748,0.508-1.223,0.95-1.663
											c1.42-1.119,2.839-2.309,2.839-4.817c0-2.58-1.621-3.937-2.399-4.581h2.097l2.202-1.383h-6.67c-1.83,0-4.467,0.433-6.398,2.027
											C3.768,4.287,3.059,6.018,3.059,7.576c0,2.634,2.022,5.328,5.604,5.328c0.339,0,0.71-0.033,1.083-0.068
											c-0.167,0.408-0.336,0.748-0.336,1.324c0,1.04,0.551,1.685,1.011,2.297c-1.524,0.104-4.37,0.273-6.467,1.562
											c-1.998,1.188-2.605,2.916-2.605,4.137c0,2.512,2.358,4.84,7.289,4.84c5.822,0,8.904-3.223,8.904-6.41
											c0.008-2.327-1.359-3.489-2.829-4.731H14.703z M10.269,11.951c-2.912,0-4.231-3.765-4.231-6.037c0-0.884,0.168-1.797,0.744-2.511
											c0.543-0.679,1.489-1.12,2.372-1.12c2.807,0,4.256,3.798,4.256,6.242c0,0.612-0.067,1.694-0.845,2.478
											c-0.537,0.55-1.438,0.948-2.295,0.951V11.951z M10.302,25.609c-3.621,0-5.957-1.732-5.957-4.142c0-2.408,2.165-3.223,2.911-3.492
											c1.421-0.479,3.25-0.545,3.555-0.545c0.338,0,0.52,0,0.766,0.034c2.574,1.838,3.706,2.757,3.706,4.479
											c-0.002,2.073-1.736,3.665-4.982,3.649L10.302,25.609z"/>
										<polygon points="23.254,11.89 23.254,8.521 21.569,8.521 21.569,11.89 18.202,11.89 18.202,13.604 21.569,13.604 21.569,17.004
												23.254,17.004 23.254,13.604 26.653,13.604 26.653,11.89      "/>
									</g>
								</g>
							</svg>
						</span>
						<span class="text">google+</span>
					</a>
				</li>
				<li class="twitter">
					<!-- Replace href with your Meta and URL information  -->
					<a href="http://twitter.com/home?status=Ridiculously%20Responsive%20Social%20Sharing%20Buttons%20by%20@joshuatuscan%20and%20@dbox%20http://kurtnoble.com/labs/rrssb" class="popup">
						<span class="icon">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
							<path d="M24.253,8.756C24.689,17.08,18.297,24.182,9.97,24.62c-3.122,0.162-6.219-0.646-8.861-2.32
								c2.703,0.179,5.376-0.648,7.508-2.321c-2.072-0.247-3.818-1.661-4.489-3.638c0.801,0.128,1.62,0.076,2.399-0.155
								C4.045,15.72,2.215,13.6,2.115,11.077c0.688,0.275,1.426,0.407,2.168,0.386c-2.135-1.65-2.729-4.621-1.394-6.965
								C5.575,7.816,9.54,9.84,13.803,10.071c-0.842-2.739,0.694-5.64,3.434-6.482c2.018-0.623,4.212,0.044,5.546,1.683
								c1.186-0.213,2.318-0.662,3.329-1.317c-0.385,1.256-1.247,2.312-2.399,2.942c1.048-0.106,2.069-0.394,3.019-0.851
								C26.275,7.229,25.39,8.196,24.253,8.756z"/>
							</svg>
						</span>
						<span class="text">twitter</span>
					</a>
				</li>
			</ul>
			<!-- FIN BOUTONS SOCIAL TAGS -->
		</aside>
		<div class="clear"></div>

	</div>

	<footer>
		<ul>
			<?php echo '<li><strong>© 2014 GO MOBILITY</strong></li>
						<li><a href="'.base_url("mentions_legales").'">Mentions l&eacute;gales</a></li>
						<li><a href="'.base_url("contact").'">Contact</a></li>';
			?>
			
		</ul>

		<div id="logos-partenaires">
			<?php echo image('logo-ardeche.gif'); ?>
			<?php echo image('logo-ardeche-2.gif'); ?>
		</div>
		<div class="clear"></div>

	</footer>
</body>
</html>