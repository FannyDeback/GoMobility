<div id="content">
<div class="bloc">
	<h3>Derni&egrave;re exp&eacute;rience</h3>
	<?php foreach ($exp as $last_exp) {
		$url = base_url("experience");
		echo '<h5>'.$exp[0]['titre'].'</h5><p>' . $exp[0]['description'] . '</p><a href="'.$url.'/'.$last_exp['id'].'">Lire la suite</a><div class="clear"></div>';
	} ?>
</div>
<div class="bloc">
	<h3>Google Map</h3>
	<!--<?php if (!empty($prom)) { ?>-->
		<h3>Les derni&egrave;res promotions</h3>

		<!--<?php foreach ($prom as $prom_title) {
			$chaine = $prom_title['titre'];
			echo '<h4>' .substr($chaine, 0, 15) . '...</h4><p>' . $prom_title['prix'] . ' &euro;</p><div class="clear"></div>';
		}
	} ?>-->
</div>
<div class="bloc">
	<h3>Mon panier</h3>
	<!--<?php foreach ($prom as $prom_title) {
		$chaine = $prom_title['titre'];
		echo '<h4>' .substr($chaine, 0, 15) . '...</h4><p>' . $prom_title['prix'] . ' &euro;</p><div class="clear"></div>';
	} ?>-->

</div>
<aside>
	<p>Nombres d'eco-actors: </p>
	<?php echo $act[0]['act']; ?>
</aside>
<div class="clear"></div>	
</div>