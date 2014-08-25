<div id="col-gauche">
	<?php
		if (isset($experience))
		{
			echo "<h1 class='form'>Expérience <strong> " . $experience->id . "</strong></h1>";
		  	echo form_open('admin/experience/update/'.$experience->id);

		  	echo form_label('Titre<span>*</span>', 'titre');
			echo form_input(array(
		  		'id' => 'titre',
		  		'name' => 'titre',
		  		'value' => $experience->titre
		  	));
		  	echo form_error('titre');

			echo '<br/><br/><br/>';

		  	echo form_label('Email<span>*</span>', 'email');
			echo form_input(array(
		  		'id' => 'email',
		  		'name' => 'email',
		  		'value' => $experience->email
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
		  		'value' => $experience->start
		  	));
		  	echo form_error('start');
			echo '<br/>';
		  	echo form_input(array(
		  		'id' => 'arrival',
		  		'class' => 'input-gps',
		  		'name' => 'arrival',
		  		'placeholder' => 'Point d\'arrivée',
		  		'value' => $experience->arrival
		  	));
		  	echo form_error('arrival');

			echo '<br/><br/><br/>';

		  	echo form_label('Description<span>*</span>', 'description');
			echo form_textarea(array(
		  		'id' => 'description',
		  		'name' => 'description',
		  		'value' => $experience->description
		  	));
		  	echo form_error('description');

			echo '<br/><br/><br/>';

			$style = array('style'	=> 'display: inline;');
			echo form_checkbox(array(
				'id'	=> 'jeu',
				'name'	=> 'jeu',
				'value'	=> 'yes'
			)) . form_label(' Je souhaite participer <a href="#" class="jeu">au jeu concours</a>', 'jeu', $style);

			echo '<br/><br/>';

			echo form_checkbox(array(
				'id'	=> 'status',
				'name'	=> 'status',
				'value'	=> 'yes'
			)) . form_label(' Publier', 'status', $style);

			echo '<br/>';

			?>
			<button class="btn btn-primary" data-toggle="modal" data-target="#publier<?php echo $experience->id; ?>">
				Mettre à jour
			</button>

			<!-- Modal -->
			<div class="modal fade" id="publier<?php echo $experience->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
							<h4 class="modal-title" id="myModalLabel">Mettre à jour une experience</h4>
						</div>
						<div class="modal-body">
							Mettre à jour l'experience n°<?php echo $experience->id; ?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
							<button type="submit" class="btn btn-primary">Modifier</button>
						</div>
					</div>
				</div>
			</div>

			<?php
			
			echo form_close();
		}
		else
		{
			echo "Aucune expérience ne correspond.";
		}
	?>
</div>