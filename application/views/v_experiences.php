<div id="col-gauche">
	<section class="toutes-les-experiences">
		<h1>Vos <strong>expériences</strong></h1>
		<?php
		if ($experiences != null) {
			foreach ($experiences as $experience) {
				var_dump($experience);
				echo '<p>'.$experience->titre.'</p>';
			}
		}
		else {
			echo "Aucune expérience ne correspond.";
		}
		?>
		<?php echo $links; ?>
	</section>
</div>
