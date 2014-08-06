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
	  		'id' => 'latStart',
	  		'name' => 'latStart',
	  		'placeholder' => 'Lattitude du départ',
	  		'value' => set_value('latStart')
	  	));
	  	echo form_error('latStart');
	  	echo form_input(array(
	  		'id' => 'longStart',
	  		'name' => 'longStart',
	  		'placeholder' => 'Longitude du départ',
	  		'value' => set_value('longStart')
	  	));
	  	echo form_error('longStart');
		echo '<br/>';
	  	echo form_input(array(
	  		'id' => 'latArrival',
	  		'name' => 'latArrival',
	  		'placeholder' => 'Lattitude de l\'arrivée',
	  		'value' => set_value('latArrival')
	  	));
	  	echo form_error('latArrival');
	  	echo form_input(array(
	  		'id' => 'longArrival',
	  		'name' => 'longArrival',
	  		'placeholder' => 'Longitude de l\'arrivée',
	  		'value' => set_value('longArrival')
	  	));
	  	echo form_error('longArrival');

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