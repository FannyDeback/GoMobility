<div id="col-gauche">
	<section class="toutes-les-experiences">
		<h1>Les <strong>expériences</strong></h1>
		<?php
		if ($experiences != null) {
			echo $order_by . "<br/>";
			echo $links . "<br/>";
			foreach ($experiences as $experience) {
				var_dump($experience);
				?>
				<!-- Fenêtre modal de suppression -->
				<!-- Button trigger modal -->
				<button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#<?php echo $experience->id; ?>">
					Supprimer
				</button>

				<!-- Modal -->
				<div class="modal fade" id="<?php echo $experience->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
								<h4 class="modal-title" id="myModalLabel">Supprimer experience</h4>
							</div>
							<div class="modal-body">
								Supprimer experience n°<?php echo $experience->id; ?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
								<a class="btn btn-danger" href="<?php echo base_url('admin/experience/supprimer') . '/' . $experience->id ?>">Supprimer</a>
							</div>
						</div>
					</div>
				</div>


				<!-- Fenêtre modal de publication -->
				<!-- Button trigger modal -->
				<button class="btn btn-primary" data-toggle="modal" data-target="#publier<?php echo $experience->id; ?>">
					Publier
				</button>

				<!-- Modal -->
				<div class="modal fade" id="publier<?php echo $experience->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
								<h4 class="modal-title" id="myModalLabel">Mettre à jour une experience</h4>
							</div>
							<div class="modal-body">
								Publier l'experience n°<?php echo $experience->id; ?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
								<a class="btn btn-primary" href="<?php echo base_url('admin/experience/publish') . '/' . $experience->id ?>">Modifier</a>
							</div>
						</div>
					</div>
				</div>
				<a href="<?php echo base_url('admin/experience/update') . '/' . $experience->id ?>">Mettre à jour</a>
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
