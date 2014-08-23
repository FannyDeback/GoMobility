<div id="col-gauche">
	<section class="tous-les-messages">
		<h1>Vos <strong>messages</strong></h1>
		<?php
		if ($messages != null) {
			echo $links;
			foreach ($messages as $message) {
				var_dump($message);
				echo "<a href='" . base_url('admin/message') . '/' . $message->id . "'>lire plus</a> ";
				echo "<a href='" . base_url('admin/message/supprimer') . '/' . $message->id . "'>supprimer</a> ";
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
