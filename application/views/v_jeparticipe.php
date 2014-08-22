<div id="container">
	<?php
	  	echo form_open('jeparticipe');

	  	echo form_label('Titre', 'titre');
	  	echo form_input(array(
	  		'id' => 'titre',
	  		'name' => 'titre',
	  		'placeholder' => 'Titre',
	  		'value' => set_value('titre')
	  	));
	  	echo form_error('titre');
		
		echo '<br/>';

	  	echo form_label('Type de transport', 'WALKING');
	  	echo form_radio('type', 'DRIVING', TRUE) .'En Covoiturage';
		echo form_radio('type', 'WALKING') .'A pieds';
		echo form_radio('type', 'TRANSIT') .'En transpors en commun';
		echo form_radio('type', 'BICYCLING') .'En Vélo<br/>';
	  	echo form_error('type');

		echo form_label('Email', 'email');
		echo form_input(array(
	  		'id' => 'email',
	  		'name' => 'email',
	  		'placeholder' => 'Email',
	  		'value' => set_value('email')
	  	));
	  	echo form_error('email');

		echo '<br/>';
		
		echo form_input(array(
	  		'id' => 'start',
	  		'name' => 'start',
	  		'placeholder' => 'Point de départ',
	  		'value' => set_value('start')
	  	));
	  	echo form_error('start');
		echo '<br/>';
	  	echo form_input(array(
	  		'id' => 'arrival',
	  		'name' => 'arrival',
	  		'placeholder' => 'Point d\'arrivée',
	  		'value' => set_value('arrival')
	  	));
	  	echo form_error('arrival');
		echo '<br/>';

	  	echo form_label('Description', 'description');
		echo '<br/>';
		echo form_textarea(array(
	  		'id' => 'description',
	  		'name' => 'description',
	  		'value' => set_value('description')
	  	));
	  	echo form_error('description');

		echo '<br/>';

		echo 'Je participe <br/>';
		echo form_radio('jeu', 'non');
		echo form_label('Oui', 'oui');
		echo form_radio('jeu', 'non', true);
		echo form_label('Non', 'non');
		echo form_error('jeu');
		
		echo '<br/>';
		
		echo form_submit('submit', 'Envoyer');
		echo form_close();
	?>
</div>