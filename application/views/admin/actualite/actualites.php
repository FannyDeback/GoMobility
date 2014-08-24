<div id="col-gauche">
	<a href="<?php echo base_url('admin/actualite'); ?>">Créer une actualité</a>
	<section class="toutes-les-experiences">
		<h1><strong>Actualités</strong></h1>
		<?php
		if ($actualites != null) {
			echo $links . "<br/>";
			foreach ($actualites as $actualite) {
				var_dump($actualite);
				?>
				<!-- Fenêtre modal de suppression -->
				<!-- Button trigger modal -->
				<button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#<?php echo $actualite->id; ?>">
					Supprimer
				</button>

				<!-- Modal -->
				<div class="modal fade" id="<?php echo $actualite->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
								<h4 class="modal-title" id="myModalLabel">Supprimer actualité</h4>
							</div>
							<div class="modal-body">
								Supprimer actualité n°<?php echo $actualite->id; ?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
								<a class="btn btn-danger" href="<?php echo base_url('admin/actualite/supprimer') . '/' . $actualite->id ?>">Supprimer</a>
							</div>
						</div>
					</div>
				</div>
				<?php
				}
				echo "<br/>" . $links;
			}
			else {
				echo "Aucune actualité ne correspond.";
			}
			?>
	</section>
</div>