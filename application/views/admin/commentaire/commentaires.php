<div id="col-droite-admin">
		<h1><strong>Commentaires</strong></h1>
		<?php
		if ($commentaires != null) {
			echo '<div class="pagination">';
				echo $links;
			echo '</div>';

			echo '<ul>';
			foreach ($commentaires as $commentaire) {
				//var_dump($commentaire);
				echo '<li>';
				echo '<h2>'.$commentaire->email.'</h2>';
				echo '<h3>'.$commentaire->date.'</h3>';
				echo '<h3><strong>Statut : </strong>'.$commentaire->status.'</h3>';
				echo substr('<p>'.$commentaire->message, 0, 300).'...</p><br/>';
				?>
				<div class="boutons">
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $commentaire->id; ?>">
						Supprimer
					</button>

					<!-- Modal -->
					<div class="modal fade" id="<?php echo $commentaire->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
									<h2 class="modal-title" id="myModalLabel">Supprimer commentaire</h2>
								</div>
								<div class="modal-body">
									Supprimer le commentaire de "<i><?php echo $commentaire->email; ?></i>" ?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
									<a type="button" class="btn btn-danger suppr" href="<?php echo base_url('admin/commentaire/supprimer') . '/' . $commentaire->id ?>">Supprimer</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Fenêtre modal de publication -->
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#publier<?php echo $commentaire->id; ?>">
						Publier
					</button>

					<!-- Modal -->
					<div class="modal fade" id="publier<?php echo $commentaire->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
									<h2 class="modal-title" id="myModalLabel">Mettre à jour un commentaire</h2>
								</div>
								<div class="modal-body">
									Publier le commentaire de "<i><?php echo $commentaire->email; ?></i>"
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
									<a type="button" class="btn btn-warning maj" href="<?php echo base_url('admin/commentaire/publish') . '/' . $commentaire->id ?>">Publier</a>
								</div>
							</div>
						</div>
					</div>
					<a class="maj btn btn-warning" href="<?php echo base_url('admin/commentaire/update') . '/' . $commentaire->id ?>">Mettre à jour</a>
				</div>
				<div class="clear"></div>
				<?php
				echo '</li>';
				echo '<div class="clear"></div>';
				echo '<br/>';
				echo '<br/>';
				}
				echo '</ul>';
			
			echo '<div class="pagination">';
			echo $links;
			echo '</div>';
		}
		else {
			echo "Aucune expérience correspond.";
		}
		?>
</div>
<div class="clear"></div>