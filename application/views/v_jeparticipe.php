<div id="content">
	<div id="col-gauche">
		<h1 class="form">Je <strong>participe</strong></h1>

		<?php
		  	echo form_open('jeparticipe');

		  	echo form_label('Titre<span>*</span>', 'titre');
			echo form_input(array(
		  		'id' => 'titre',
		  		'name' => 'titre',
		  		'value' => set_value('titre')
		  	));
		  	echo form_error('titre');

			echo '<br/><br/><br/>';

		  	echo form_label('Email<span>*</span>', 'email');
			echo form_input(array(
		  		'id' => 'email',
		  		'name' => 'email',
		  		'value' => set_value('email')
		  	));
		  	echo form_error('email');
			
			echo '<br/><br/><br/>';

		  	echo form_label('Type de transport<span>*</span>', 'WALKING');
		  	echo form_radio('type', 'DRIVING', TRUE) .'En Covoiturage <span class="espace"></span>';
			echo form_radio('type', 'WALKING') .'A pieds <span class="espace"></span>';
			echo form_radio('type', 'TRANSIT') .'En transpors en commun <span class="espace"></span>';
			echo form_radio('type', 'BICYCLING') .'En Vélo <span class="espace"></span>';
		  	echo form_error('type');

			echo '<br/><br/><br/>';
			
			echo form_label('Coordonnées GPS<span>*</span>', 'start');
			echo form_input(array(
		  		'id' => 'start',
		  		'class' => 'input-gps',
		  		'name' => 'start',
		  		'placeholder' => 'Point de départ',
		  		'value' => set_value('start')
		  	));
		  	echo form_error('start');
			echo '<br/>';
		  	echo form_input(array(
		  		'id' => 'arrival',
		  		'class' => 'input-gps',
		  		'name' => 'arrival',
		  		'placeholder' => 'Point d\'arrivée',
		  		'value' => set_value('arrival')
		  	));
		  	echo form_error('arrival');

			echo '<br/><br/><br/>';

		  	echo form_label('Description<span>*</span>', 'description');
			echo form_textarea(array(
		  		'id' => 'description',
		  		'name' => 'description',
		  		'value' => set_value('description')
		  	));
		  	echo form_error('description');

			echo '<br/><br/><br/>';

			echo 'Je souhaite participer <a href="#" class="jeu">au jeu concours</a><br/>';
			echo form_radio('jeu', 'non') .'Oui <span class="espace"></span>';
			echo form_radio('jeu', 'non', true) .'Non <span class="espace"></span>';
			echo form_error('jeu');
			
			echo '<br/>';
			
			echo form_submit('submit', 'Envoyer');
			echo form_close();
		?>
	</div>

	<aside>
		<section class="nombre-ecoacteur">
			<p><!--<?php echo $act; ?>--></p>
		</section>

		<section class="appli-mobile">
		<?php echo image('appli-mobile.gif') ?>
			<a href="#" id="appli-mobile">
				Télécharger<br/>
				<span class="f15 light">L'application Mobile</span>
			</a>
		</section>

		<section class="derniere-actualite">
			<h1><strong>Dernière</strong> actualité</h1>
			<?php echo image('img-actualite.jpg') ?>
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