<div id="col-gauche">
	<section class="tous-les-messages">
		<h1>Vos <strong>messages</strong></h1>
		<?php
		if ($messages != null) {
			echo $links;
			foreach ($messages as $message) {
				var_dump($message);
			}
			echo $links;
		}
		else {
			echo "Aucun message.";
		}
		?>
	</section>
</div>
