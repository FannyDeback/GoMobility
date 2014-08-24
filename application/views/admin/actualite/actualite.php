<div id="col-gauche">
	<h4 class="form">Créer une actualité</h4>

	<?php
		echo form_open('admin/actualite/create');

		echo form_label('Titre de l\'actualité<span>*</span>', 'titre');
		echo form_input(array(
			'id' => 'titre',
			'name' => 'titre',
			'value' => set_value('titre')
		));
		echo form_error('titre');

		echo '<br/><br/><br/>';

		echo form_label('Description de l\'actualité<span>*</span>', 'description');
		echo form_textarea(array(
			'id' => 'description',
			'name' => 'description',
			'value' => set_value('description')
		));
		echo form_error('description');

		echo '<br/>';

		echo form_submit('submit', 'Envoyer');
		echo form_close();
	?>
</div>
