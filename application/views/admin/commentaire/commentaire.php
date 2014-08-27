<div id="col-droite-admin">
	<h1><strong>Mettre à jour</strong> le commentaire de <i><?php echo $commentaire->email; ?></i></h1>
	<?php
		if (isset($commentaire))
		{
		  	echo form_open('admin/commentaire/update/'.$commentaire->id);

	  	  	echo form_label('Email<span>*</span>', 'email');
	  		echo form_input(array(
	  	  		'id' => 'email',
	  	  		'name' => 'email',
	  	  		'value' => $commentaire->email
	  	  	));
	  	  	echo form_error('email');

	  		echo '<br/><br/><br/>';

  		  	echo form_label('Message<span>*</span>', 'message');
  			echo form_textarea(array(
  		  		'id' => 'message',
  		  		'name' => 'message',
  		  		'value' => $commentaire->message
  		  	));
  		  	echo form_error('message');

  			echo '<br/><br/><br/>';


		  	echo form_label('Auteur', 'auteur');
			echo form_input(array(
		  		'id' => 'auteur',
		  		'name' => 'auteur',
		  		'value' => $commentaire->auteur
		  	));
		  	echo form_error('auteur');

			echo '<br/><br/><br/>';

		  	echo form_label('Website', 'website');
			echo form_input(array(
		  		'id' => 'website',
		  		'name' => 'website',
		  		'value' => $commentaire->website
		  	));
		  	echo form_error('website');

			echo '<br/><br/><br/>';

			$style = array('style'	=> 'display: inline;');
			echo form_checkbox(array(
				'id'	=> 'status',
				'name'	=> 'status',
				'value'	=> 'yes',
				'checked'	=> ($commentaire->status == "published") ? TRUE : FALSE
			)) . form_label(' Publier', 'status', $style);

			echo '<br/>';

			?>
			<br/>
			<br/>
			<button class="maj btn btn-warning l100" data-toggle="modal" data-target="#publier<?php echo $commentaire->id; ?>">
				Mettre à jour
			</button>

			<!-- Modal -->
			<div class="modal fade" id="publier<?php echo $commentaire->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
							<h2 class="modal-title" id="myModalLabel">Mettre à jour ce commentaire</h2>
						</div>
						<div class="modal-body">
							Mettre à jour le commentaire : " <i><?php echo character_limiter($commentaire->message, 30) ;?></i> "
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
							<button type="submit" class="btn btn-warning">Modifier</button>
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
<div class="clear"></div>