<div id="content">
	<div id="col-gauche">
		<h1 class="form">Je <strong>participe</strong></h1>

		<?php
		  	echo form_open('jeparticipe');

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
			
			echo form_label('Coordonnées GPS<span>*</span>', 'gps');
			echo form_input(array(
		  		'id' => 'latStart',
		  		'class'=> 'input-gps',
		  		'name' => 'latStart',
		  		'placeholder' => 'Lattitude du départ',
		  		'value' => set_value('latStart')
		  	));
		  	echo form_error('latStart');
		  	echo form_input(array(
		  		'id' => 'longStart',
		  		'class'=> 'input-gps',
		  		'name' => 'longStart',
		  		'placeholder' => 'Longitude du départ',
		  		'value' => set_value('longStart')
		  	));
		  	echo form_error('longStart');
			echo '<br/>';
		  	echo form_input(array(
		  		'id' => 'latArrival',
		  		'class'=> 'input-gps',
		  		'name' => 'latArrival',
		  		'placeholder' => 'Lattitude de l\'arrivée',
		  		'value' => set_value('latArrival')
		  	));
		  	echo form_error('latArrival');
		  	echo form_input(array(
		  		'id' => 'longArrival',
		  		'class'=> 'input-gps',
		  		'name' => 'longArrival',
		  		'placeholder' => 'Longitude de l\'arrivée',
		  		'value' => set_value('longArrival')
		  	));
		  	echo form_error('longArrival');

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