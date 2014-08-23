

<div id="content">
	<div id="col-gauche">
		<section class="derniere-experience">
			<h1><strong>La dernière</strong> expérience</h1>
			<?php
				$url = base_url("experience");
				echo '<h2>'.$exp->titre.'</h2>
					  <h3>'.$exp->type. /* A REMPLACER PAR LA DATE */'</h3>
					  <p>' . $exp->description . '</p>
					  <a href="'.$url.'/'.$exp->id.'" id="en-savoir-plus">En savoir plus</a>
					  <div class="clear"></div>';
			?>
		</section>

		<section class="dernieres-experiences">
			<h1><strong>Les 10 dernières</strong> expériences</h1>
		</section>
	</div>

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