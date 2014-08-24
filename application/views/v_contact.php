<div id="col-gauche">
	<h1><strong>Contactez</strong>-nous</h1>
	<?php
		echo form_open('c_contact');

		echo form_label('Nom<span>*</span>', 'nom');
		echo form_input(array(
			'id' => 'nom',
			'name' => 'nom',
			'value' => set_value('nom')
		));
		echo form_error('nom');

		echo '<br/><br/><br/>';

		echo form_label('E-mail<span>*</span>', 'email');
		echo form_input(array(
			'id' => 'email',
			'name' => 'email',
			'value' => set_value('email')
		));
		echo form_error('email');

		echo '<br/><br/><br/>';

		echo form_label('Votre message<span>*</span>', 'message');
		echo form_textarea(array(
			'id' => 'message',
			'name' => 'message',
			'value' => set_value('message')
		));
		echo form_error('message');

		echo form_submit('submit', 'Envoyer');
		echo form_close();
	?>
</div>