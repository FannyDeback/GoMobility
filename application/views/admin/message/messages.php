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

				<div class="boutons-messages">
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
					echo "<a class='maj btn btn-info' href='" . base_url('admin/message') . '/' . $message->id . "'>Voir plus</a> ";
					// echo "<a href='" . base_url('admin/message/update') . '/' . $message->id . "'>mise à jour</a><br/>";
				echo '</div>
				<div class="clear"></div>';
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
			echo "Aucun message.";
		}
		?>
</div>
<div class="clear"></div>