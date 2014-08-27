<div id="col-droite-admin">
		<h1>Eco-<strong>acteurs</strong></h1>
		<?php
		if ($experiences != null) {
			echo '<div class="pagination">';
				echo $links;
			echo '</div>';

			echo '<ul>';
				foreach ($experiences as $experience) {
					//var_dump($experience);
					echo '<li>';
						echo '<h2>'.$experience->titre.'</h2>';
						echo '<h4><strong>Départ :</strong> '.$experience->start.' | <strong>Arrivée :</strong> '.$experience->arrival.'</h4>';
						echo '<h3><strong>Moyen de transport :</strong> '.$experience->type.'</h3>';
						echo substr('<p>'.$experience->description, 0, 200).'...</p>';
						echo '<h5><strong>Gaz à effet de serre :</strong> '.$experience->ges.'</h5><br/>';
					?>
					<div class="boutons">
						<!-- Fenêtre modal de suppression -->
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $experience->id; ?>">
							Supprimer
						</button>

						<!-- Modal -->
						<div class="modal fade" id="<?php echo $experience->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
										<h2 class="modal-title" id="myModalLabel">Supprimer experience</h2>
									</div>
									<div class="modal-body">
										Supprimer experience : "<i><?php echo substr($experience->titre, 0, 30); ?> ...</i>"
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
										<a type="button" class="btn btn-danger suppr" href="<?php echo base_url('admin/experience/supprimer') . '/' . $experience->id ?>">Supprimer</a>
									</div>
								</div>
							</div>
						</div>


						<!-- Fenêtre modal de publication -->
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#publier<?php echo $experience->id; ?>">
							Publier
						</button>


						<!-- Modal -->
						<div class="modal fade" id="publier<?php echo $experience->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
										<h2 class="modal-title" id="myModalLabel">Mettre à jour une experience</h2>
									</div>
									<div class="modal-body">
										Publier l'experience : "<i><?php echo substr($experience->titre, 0, 30); ?> ...</i>"
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
										<a type="button" class="btn btn-warning maj" href="<?php echo base_url('admin/experience/publish') . '/' . $experience->id ?>">Modifier</a>
									</div>
								</div>
							</div>
						</div>
						<a class="maj btn btn-warning" href="<?php echo base_url('admin/experience/update') . '/' . $experience->id ?>">Mettre à jour</a>
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
