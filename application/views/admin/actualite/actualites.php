<div id="col-droite-admin">
		<h1><strong>Actualités</strong>
		<a class="creer btn btn-success" href="<?php echo base_url('admin/actualite'); ?>"><?php echo image('ajouter.png'); ?></a>
		<div class="clear"></div>
		</h1>
		
		<?php
		if ($actualites != null) {
			echo '<div class="pagination">';
				echo $links;
			echo '</div>';

			echo '<ul>';
			foreach ($actualites as $actualite) {
				//var_dump($actualite);
				echo '<li>';
					echo '<h2>'.$actualite->titre.'</h2>';
					echo substr('<p>'.$actualite->description, 0, 300).'...</p><br/>';
				?>
				<div class="boutons">
					<!-- Fenêtre modal de suppression -->
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $actualite->id; ?>">
						Supprimer
					</button>

					<!-- Modal -->
					<div class="modal fade" id="<?php echo $actualite->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
									<h2 class="modal-title" id="myModalLabel">Supprimer actualité</h2>
								</div>
								<div class="modal-body">
									Supprimer l'actualité "<i><?php echo substr($actualite->titre, 0, 30); ?> ...</i>"
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
									<a type="button" class="btn btn-danger suppr" href="<?php echo base_url('admin/actualite/supprimer') . '/' . $actualite->id ?>">Supprimer</a>
								</div>
							</div>
						</div>
					</div>

					<!-- Fenêtre modal de publication -->
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#publier<?php echo $actualite->id; ?>">
						Publier
					</button>

					<!-- Modal -->
					<div class="modal fade" id="publier<?php echo $actualite->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
									<h2 class="modal-title" id="myModalLabel">Mettre à jour une actualité</h2>
								</div>
								<div class="modal-body">
									Publier l'actualité "<i><?php echo substr($actualite->titre, 0, 30); ?> ...</i>"
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
									<a type="button" class="btn btn-warning maj" href="<?php echo base_url('admin/actualite/publish') . '/' . $actualite->id ?>">Modifier</a>
								</div>
							</div>
						</div>
					</div>
					<a class="maj btn btn-warning" href="<?php echo base_url('admin/actualite/update') . '/' . $actualite->id ?>">Mettre à jour</a>
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
				echo "Aucune actualité ne correspond.";
			}
			?>
</div>
<div class="clear"></div>