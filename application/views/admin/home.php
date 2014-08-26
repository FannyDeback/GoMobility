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
		echo '<div id="user">
				<strong>User :</strong> '.$id_user. ' | <a href="'.base_url('admin/logout').'">Déconnexion</a>
			</div>
			<div class="clear"></div>';



		echo '<aside id="admin">';
		echo	'<ul class="list-group">
					<li id="home">
		  				<a href="'.base_url('admin').'">
		    				Dashboard
		    			</a>
		  			</li>

		 			<li class="list-group-item" id="ecoacteur">
		 				<a href="'.base_url('admin/experiences').'">
		    				Eco-acteurs
		    			</a>
		  			</li>

		  			<li class="list-group-item" id="message">
						<a href="'.base_url('admin/messages').'">
		    				Messages
		    			</a>
		  			</li>

		  			<li class="list-group-item" id="actualites">
		 				<a href="'.base_url('admin/actualites').'">
		    				Actualités
		    			</a>
		  			</li>

		  			<li id="site">
		  				<a href="'.base_url('home').'">
		    				Site public
		    			</a>
		  			</li>

		  			<li id="meilleur-ecoacteur" class="aside">
		  				<a href="#">
		  					<strong>Meilleur éco-acteur</strong>
		  				</a>
		  			</li>

				</ul>';	
		echo '</aside>';


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

		  			<li id="meilleur-ecoacteur">
		  				<strong>Meilleur éco-acteur : </strong>
		  				'.$bestactor.'
		  			</li>

				</ul>';
		echo '</div>';

		echo '<div class="clear"></div>';

	}
?>
