<div id="content">
	<div id="col-gauche">
		<section class="toutes-les-experiences">
			<h1>Vos <strong>expériences</strong></h1>
			<?php
			if ($experiences != null) {
				foreach ($experiences as $experience) {
					var_dump($experience);
					echo '<p>'.$experience->titre.'</p>';
				}
			}
			else {
				echo "Aucune expérience ne correspond.";
			}
			?>
			<?php echo $links; ?>
		</section>
	</div>
	<aside>
		<section class="nombre-ecoacteur">
			<p><!--<?php echo $act; ?>--></p>
		</section>

		<section class="appli-mobile">
			<?php image('appli-mobile.gif') ?>
			<a href="#" id="appli-mobile">
				Télécharger<br/>
				<span class="f15 light">L'application Mobile</span>
			</a>
		</section>

		<section class="derniere-actualite">
			<h1><strong>Dernière</strong> actualité</h1>
			<?php image('img-actualite.jpg') ?>
			<h3><a href="#"><strong>Plus</strong> d'infos</a></h3>
			<footer>
				Titre acutalité
			</footer>
		</section> 

		<section class="facebook">
			<a href="#">
				<?php image('bouton-facebook.png') ?>
			</a>
		</section>
	</aside>

	<div class="clear"></div>
</div>
