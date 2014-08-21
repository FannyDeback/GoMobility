<div id="container">
	<?php
	  	echo form_open('c_contact');

 	  	echo form_label('Nom', 'nom');

 	  	echo form_input(array(
 	  		'id' => 'nom',
 	  		'name' => 'nom',
 	  		'placeholder' => 'Nom',
 	  		'value' => set_value('nom')
 	  	));
 	  	echo form_error('nom');
 		
 		echo '<br/>';

 	  	echo form_label('E-mail', 'email');

 	  	echo form_input(array(
 	  		'id' => 'email',
 	  		'name' => 'email',
 	  		'placeholder' => 'Email',
 	  		'value' => set_value('email')
 	  	));
 	  	echo form_error('email');

  	  	echo form_label('Votre message', 'message');
  		echo '<br/>';
  		echo form_textarea(array(
  	  		'id' => 'message',
  	  		'name' => 'message',
  	  		'value' => set_value('message')
  	  	));
  	  	echo form_error('message');

  	  	echo form_submit('submit', 'Envoyer');
	  	echo form_close(); ?>
	?>
</div>