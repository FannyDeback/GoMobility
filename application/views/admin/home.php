<?php
	// Affichage du formulaire si non connecté
	if (!isset($id_user))
	{
		echo '<div id="content-central">';
		echo 	'<h1><strong>Connexion</strong> à l\'administration</h1>';
		echo 	form_open('admin/index');

		echo 	form_label('Login', 'login');
		echo 	form_input(array(
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
		echo '</div>';
		if ($this->session->flashdata('noconnect'))
			echo "<div>
					<strong>" . $this->session->flashdata('noconnect') . "<strong>
				 </div>";
	}
	// Sinon affichage du dashboard
	else
	{
		echo '<div id="col-droite-admin">';
		echo	'<ul class="list-group">
		 			<li class="list-group-item">
		 				<a href="'.base_url('admin/experiences').'">
		    				Nombre d\'éco-acteurs
		    			</a>
		    			<div class="badge">'.$exp_ligne.'</div>	
		    			<div class="clear"></div>	
		    			<i>En attente</i>
		    			<div class="badge badge-attente">'.$exp_attente.'</div>	
		    			<div class="clear"></div>
		  			</li>

		  			<li class="list-group-item">
						<a href="'.base_url('admin/messages').'">
		    				Nombre de messages
		    			</a>
		    			<div class="badge">'.$message_nonlu.'</div>	
		    			<div class="clear"></div>	
		    			<i>Non lus</i>
		    			<div class="badge badge-attente">'.$message_lu.'</div>	
		    			<div class="clear"></div>
		  			</li>

		  			<li class="list-group-item">
						<a href="'.base_url('admin/commentaires').'">
		    				Nombre de commentaires
		    			</a>
		    			<div class="badge">commentaires_nonlu</div>	
		    			<div class="clear"></div>	
		    			<i>Non lus</i>
		    			<div class="badge badge-attente">commentaires_lu</div>	
		    			<div class="clear"></div>
		  			</li>

		  			<li id="meilleur-ecoacteur">
		  				<strong>Meilleur éco-acteur : </strong>';
		  				if (isset($bestactor))
		  					echo $bestactor;
		  				else
		  					echo "";
		  			echo '</li>

				</ul>';
		echo '</div>';

		echo '<div class="clear"></div>';

	}
?>
