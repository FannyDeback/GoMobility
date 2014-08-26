<div id="col-gauche">
	<section class="tous-les-messages">
		<h1><strong>Commentaires</strong></h1>
		<?php
		if ($commentaires != null) {
			echo $links;
			foreach ($commentaires as $commentaire) {
				var_dump($commentaire);
				?>
				<!-- Button trigger modal -->
				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#<?php echo $commentaire->id; ?>">
					Supprimer
				</button>

				<!-- Modal -->
				<div class="modal fade" id="<?php echo $commentaire->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
								<h4 class="modal-title" id="myModalLabel">Supprimer commentaire</h4>
							</div>
							<div class="modal-body">
								Supprimer commentaire n°<?php echo $commentaire->id; ?> ?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
								<a class="btn btn-primary" href="<?php echo base_url('admin/commentaire/supprimer') . '/' . $commentaire->id ?>">Supprimer</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Fenêtre modal de publication -->
				<!-- Button trigger modal -->
				<button class="btn btn-primary" data-toggle="modal" data-target="#publier<?php echo $commentaire->id; ?>">
					Publier
				</button>

				<!-- Modal -->
				<div class="modal fade" id="publier<?php echo $commentaire->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
								<h4 class="modal-title" id="myModalLabel">Mettre à jour un commentaire</h4>
							</div>
							<div class="modal-body">
								Publier le commentaire n°<?php echo $commentaire->id; ?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
								<a class="btn btn-primary" href="<?php echo base_url('admin/commentaire/publish') . '/' . $commentaire->id ?>">Modifier</a>
							</div>
						</div>
					</div>
				</div>
				<a href="<?php echo base_url('admin/commentaire/update') . '/' . $commentaire->id ?>">Mettre à jour</a>
				<?php
			}
			echo "<br/>" . $links;
		}
		else {
			echo "Aucune expérience correspond.";
		}
		?>
	</section>
</div>
