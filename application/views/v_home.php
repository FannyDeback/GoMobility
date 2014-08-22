<div id="content">
<div class="bloc">
	<h3>Derni&egrave;re exp&eacute;rience</h3>
	<?php
		$url = base_url("experience");
		echo '<h5>' . substr($exp->titre, 0, 50) .'</h5><p>' . substr($exp->description, 0, 50) . '</p><a href="' . $url . '/' . $exp->id.'">Lire la suite</a><div class="clear"></div>';
	?>
</div>
<aside>
	<p>Nombres d'eco-acteurs: <?php echo $act; ?></p>
	<p>Meilleur eco-acteur: </p>
	<?php echo $best->titre . ' avec ' . $best->ges . ' de gaz à effet de serre utilisés ! <br />
	<a href="' . base_url('jeu') . '">Description du jeu</a>'; ?>
</aside>
<div class="clear"></div>	
</div>