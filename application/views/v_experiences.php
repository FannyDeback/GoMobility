<div id="content">
	<div class="bloc">
		<h1>Exp&eacute;riences</h1>
		<?php
		if ($experiences != null) {
			foreach ($experiences as $experience) {
				var_dump($experience);
			}
		}
		else {
			echo "Aucune expérience ne correspond.";
		}
		?>
	</div>
	<?php echo $links; ?>
</div>
