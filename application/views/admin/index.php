<div id="container">
	<?php
	// Si pas de connexion
	if (!isset($id_user))
	{
		echo "<h1>Connexion à l'administration</h1>";
		echo form_open('admin/index');

		echo form_label('Login', 'login');
		echo form_input(array(
			'id' => 'login',
			'name' => 'login',
			'placeholder' => 'Login',
			'value' => set_value('login')
		));
		echo form_error('login');

		echo '<br/>';

		echo form_label('Password', 'password');
		echo form_password(array(
			'id' => 'password',
			'name' => 'password',
			'placeholder' => 'Password',
			'value' => set_value('password')
		));
		echo form_error('password');

		echo '<br/>';

		echo form_submit('submit', 'Envoyer');
		echo form_close();

		if ($this->session->flashdata('noconnect'))
			echo "<div>
					<strong>" . $this->session->flashdata('noconnect') . "<strong>
				 </div>";
	}
	else
	{
		echo "user : " . $id_user;
		echo "<a href='".base_url('admin/logout')."'>Déconnexion</a>";
	}
	?>
</div>