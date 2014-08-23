

<div id="content">
	<div id="col-gauche">
		<section class="derniere-experience">
			<h1><strong>La dernière</strong> expérience</h1>
			<?php foreach ($exp as $last_exp) {
				$url = base_url("experience");
				echo '<h2>'.$exp[0]['titre'].'</h2>
					  <h3>'.$exp[0]['type']. /* A REMPLACER PAR LA DATE */'</h3>
					  <p>' . $exp[0]['description'] . '</p>
					  <a href="'.$url.'/'.$last_exp['id'].'" id="en-savoir-plus">En savoir plus</a>
					  <div class="clear"></div>';
			} ?>
		</section>

		<section class="dernieres-experiences">
			<h1><strong>Les 10 dernières</strong> expériences</h1>
			<!--<?php if (!empty($prom)) { ?>-->
				<h3>Les derni&egrave;res promotions</h3>

				<!--<?php foreach ($prom as $prom_title) {
					$chaine = $prom_title['titre'];
					echo '<h4>' .substr($chaine, 0, 15) . '...</h4><p>' . $prom_title['prix'] . ' &euro;</p><div class="clear"></div>';
				}
			} ?>-->
		</section>

		<!--<div class="bloc">
			<h3>Mon panier</h3>
			<?php foreach ($prom as $prom_title) {
				$chaine = $prom_title['titre'];
				echo '<h4>' .substr($chaine, 0, 15) . '...</h4><p>' . $prom_title['prix'] . ' &euro;</p><div class="clear"></div>';
			} ?>
		</div>-->

	</div>
	
	<aside>
		<section class="nombre-ecoacteur">
			<p><?php echo $act; ?></p>
		</section>

		<section class="appli-mobile">
			<img src="<?php echo(IMG.'appli-mobile.gif'); ?>" />
			<a href="#" id="appli-mobile">
				Télécharger<br/>
				<span class="f15 light">L'application Mobile</span>
			</a>
		</section>

		<section class="derniere-actualite">
			<h1><strong>Dernière</strong> actualité</h1>
			<img src="<?php echo(IMG.'img-actualite.jpg'); ?>"/>
			<h3><a href="#"><strong>Plus</strong> d'infos</a></h3>
			<footer>
				Titre acutalité
			</footer>
		</section> 

		<section class="facebook">
			<a href="#">
				<img src="<?php echo(IMG.'bouton-facebook.png'); ?>"/>
			</a>
		</section>
	</aside>

	<div class="clear"></div>	
</div>