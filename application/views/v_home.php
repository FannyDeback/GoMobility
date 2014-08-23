<div id="col-gauche">
	<section class="derniere-experience">
		<h1><strong>La dernière</strong> expérience</h1>
		<?php
			$url = base_url("experience");
			echo '<h2>'.$exp->titre.'</h2>
				  <h3>'.$exp->type. /* A REMPLACER PAR LA DATE */'</h3>
				  <p>' . $exp->description . '</p>
				  <a href="'.$url.'/'.$exp->id.'" id="en-savoir-plus">En savoir plus</a>
				  <div class="clear"></div>';
		?>
	</section>

	<section class="dernieres-experiences">
		<h1><strong>Les 10 dernières</strong> expériences</h1>
	</section>
</div>
