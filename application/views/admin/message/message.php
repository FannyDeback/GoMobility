<div id="user">
	<!-- <strong>User :</strong><?php echo $id_user; ?> | -->
	<a href="<?php echo base_url('admin/logout'); ?>">Déconnexion</a>
</div>
<div class="clear"></div>

<?php 
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

	  			<li class="list-group-item" id="commentaires">
					<a href="'.base_url('admin/commentaires').'">
	    				Commentaires
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
?>

<div id="col-droite-admin">
<h1><strong>Détail</strong> du message de <i><?php echo $message->nom; ?></i></h1>
<?php
	if (isset($message))
	{
		echo '<h2>'.$message->nom.'</h2>';
		echo '<h4>'.$message->email.'</h4>';
		echo '<p>'.$message->message.'</p>';
	}
	else
	{
		echo "Aucun message correspondant.";
	}
?>

</div>
<div class="clear"></div>