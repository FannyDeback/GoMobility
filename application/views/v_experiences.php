<div id="col-gauche">
	<section class="toutes-les-experiences">
		<h1>Vos <strong>expériences</strong></h1>
		<?php echo '<div class="pagination">'.$links.'</div><br/>'; ?>

		<ul>
			<?php
			if ($experiences != null) {
				foreach ($experiences as $experience) {
					//var_dump($experience);
					echo '<li>';
						echo '<a href="'.base_url('experience').'/'.$experience->id.'"><h2>'.$experience->titre.'</h2></a>';
						echo '<h3><strong>Moyen de transport :</strong> '.$experience->type.'</h3>';
						echo substr('<p>'.$experience->description, 0, 200).'...</p><br/>';
						echo '<a href="'.base_url('experience').'/'.$experience->id.'" class="lire-la-suite">[ lire la suite ]</a>';
					echo '</li>';
				}
			}
			else {
				echo "Aucune expérience ne correspond.";
			}
			?>
		</ul>

		<?php echo '<div class="pagination">'.$links.'</div>'; ?>
	</section>
</div>
