<div id="content">
<div class="bloc">
	<h3>Derni&egrave;re exp&eacute;rience</h3>
	<?php foreach ($exp as $last_exp) {
		$url = base_url("experience");
		echo '<h5>'.$exp[0]['titre'].'</h5><p>' . $exp[0]['description'] . '</p><a href="'.$url.'/'.$last_exp['id'].'">Lire la suite</a><div class="clear"></div>';
	} ?>
</div>
<aside>
	<p>Nombres d'eco-acteurs: <?php echo $act; ?></p>
	<p>Meilleur eco-acteur: </p>
	<?php echo $best->titre . ' avec ' . $best->ges . ' de gaz à effet de serre utilisés ! <br />
	<a href="' . base_url('jeu') . '">Description du jeu</a>'; ?>
</aside>
<div class="clear"></div>	
</div>