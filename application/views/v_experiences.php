<div id="col-gauche">
	<section class="toutes-les-experiences">
		<h1>Vos <strong>expériences</strong></h1>
		<?php
		if ($experiences != null) {
			foreach ($experiences as $experience) {
				var_dump($experience);
				echo '<p>'.$experience->titre.'</p>';
				echo "<a href='".base_url('experience').'/'.$experience->id."'>voir plus</a>";
			}
		}
		else {
			echo "Aucune expérience ne correspond.";
		}
		?>
		<?php echo $links; ?>
	</section>
</div>
