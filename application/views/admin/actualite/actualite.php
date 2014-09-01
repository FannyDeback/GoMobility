<div id="col-droite-admin">
	<?php
		if (isset($actualite))
		{
			echo '<h1><strong>Modifier</strong> l\'actualité <i>"'.substr($actualite->titre, 0, 20).'"...</i></h1>';
			echo form_open('admin/actualite/update/'.$actualite->id);
		}			
		else
		{
			echo "<h1><strong>Créer</strong> une actualité</h1>";
			echo form_open('admin/actualite/create');
		}

		echo form_label('Titre de l\'actualité<span>*</span>', 'titre');
		echo form_input(array(
			'id' => 'titre',
			'name' => 'titre',
			'value' => (isset($actualite)) ? $actualite->titre : set_value('titre')
		));
		echo form_error('titre');

		echo '<br/><br/><br/>';

		echo form_label('Description de l\'actualité<span>*</span>', 'description');
		echo form_textarea(array(
			'id' => 'description',
			'name' => 'description',
			'value' => (isset($actualite)) ? $actualite->description : set_value('description')
		));
		echo form_error('description');

		echo '<br/><br/>';

		$style = array('style'	=> 'display: inline;');
		echo form_checkbox(array(
			'id'	=> 'status',
			'name'	=> 'status',
			'value'	=> 'yes',
			'checked'	=> (isset($actualite) && $actualite->status == "published") ? TRUE : FALSE
		)) . form_label(' Publier', 'status', $style);

		echo '<br/>';
		if (isset($actualite)) {
		?>

		<!-- Fenêtre modal de publication -->
		<!-- Button trigger modal -->

		<br/>
		<div class="boutons">
			<button class="maj btn btn-warning l100" data-toggle="modal" data-target="#publier<?php echo $actualite->id; ?>">
				Mettre à jour
			</button>
		</div>
		<div class="clear"></div>

		<!-- Modal -->
		<div class="modal fade" id="publier<?php echo $actualite->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
						<h2 class="modal-title" id="myModalLabel">Mettre à jour une actualité</h2>
					</div>
					<div class="modal-body">
						Mettre à jour l'actualité "<i><?php echo substr($actualite->titre, 0, 30); ?> ...</i>"
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
						<button type="submit" class="btn btn-warning">Modifier</button>
					</div>
				</div>
			</div>
		</div>

		<?php
		}
		else
		{
			echo form_submit('submit','Créer');
		}	
		echo form_close();
	?>
</div>
<div class="clear"></div>
