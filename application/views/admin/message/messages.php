<div id="col-gauche">
	<section class="tous-les-messages">
		<h1>Vos <strong>messages</strong></h1>
		<?php
		if ($messages != null) {
			echo $links;
			foreach ($messages as $message) {
				var_dump($message);
				?>
				<!-- Button trigger modal -->
				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#<?php echo $message->id; ?>">
					Supprimer
				</button>

				<!-- Modal -->
				<div class="modal fade" id="<?php echo $message->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
								<h4 class="modal-title" id="myModalLabel">Supprimer message</h4>
							</div>
							<div class="modal-body">
								Supprimer message n°<?php echo $message->id; ?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
								<a class="btn btn-primary" href="<?php echo base_url('admin/message/supprimer') . '/' . $message->id ?>">Supprimer</a>
							</div>
						</div>
					</div>
				</div>
				<?php
				echo "<a href='" . base_url('admin/message') . '/' . $message->id . "'>lire plus</a> ";
				// echo "<a href='" . base_url('admin/message/update') . '/' . $message->id . "'>mise à jour</a><br/>";
			}
			echo $links;
		}
		else {
			echo "Aucun message.";
		}
		?>
	</section>
</div>
