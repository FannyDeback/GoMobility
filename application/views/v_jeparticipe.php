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

		$style = array('style'	=> 'display: inline;');
		echo form_checkbox(array(
			'id'	=> 'jeu',
			'name'	=> 'jeu',
			'value'	=> 'yes'
		)) . form_label(' Je souhaite participer au <a href="'.base_url("jeu").'">jeu concours</a>', 'jeu', $style);

		echo '<br/>';

		echo form_submit('submit', 'Envoyer');
		echo form_close();
	?>
</div>