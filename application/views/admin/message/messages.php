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
		<h1>Vos <strong>messages</strong></h1>
		<?php
		if ($messages != null) {
			echo '<div class="pagination">';
				echo $links;
			echo '</div>';

			echo '<ul>';
			foreach ($messages as $message) {
				//var_dump($message);
				echo '<li>';
					echo '<a href="'.base_url('experience').'/'.$message->id.'"><h2>'.$message->nom.'</h2></a>';
					echo '<h4><strong>Email :</strong> '.$message->email.'</h4>';
					echo substr('<p>'.$message->message, 0, 100).'...</p><br/>';
				?>
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $message->id; ?>">
					Supprimer
				</button>

				<!-- Modal -->
				<div class="modal fade" id="<?php echo $message->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
								<h2 class="modal-title" id="myModalLabel">Supprimer message</h2>
							</div>
							<div class="modal-body">
								Supprimer le message de <strong><?php echo $message->nom; ?></strong>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
								<a type="button" class="btn btn-danger suppr" href="<?php echo base_url('admin/message/supprimer') . '/' . $message->id ?>">Supprimer</a>
							</div>
						</div>
					</div>
				</div>
				<?php
				echo "<a class='maj btn btn-info' href='" . base_url('admin/message') . '/' . $message->id . "'>lire plus</a> ";
				// echo "<a href='" . base_url('admin/message/update') . '/' . $message->id . "'>mise à jour</a><br/>";

				echo '</li>';
				echo '<br/>';
				echo '<br/>';
			}
			echo '</ul>';
			
			echo '<div class="pagination">';
				echo $links;
			echo '</div>';
		}
		else {
			echo "Aucun message.";
		}
		?>
</div>
<div class="clear"></div>