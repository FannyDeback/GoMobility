<?php
if ($expStatus == 'published')
{
?>
<div id="col-gauche">
	<section class="derniere-experience">
		<h1>Exp&eacute;rience <span id="experience-id"><?php echo $id; ?></span></h1>

		<div id="une-experience">
		</div>

		<div id="map-canvas">
			<p>Un problème est survenue lors du chargement de la map...</p>
		</div>
	</section>
</div>

<!-- TODO panel d'affichage de la route  -->
<!--<div id="map-panel"></div>-->

<script type="text/javascript" src="<?php echo js_url('maps'); ?>">
</script>
<script type="text/javascript">
	$(function() {
		show_itineraire($("#experience-id").text());
	});
</script>
<?php
}
else if ($expStatus == 'unpublished')
	// mettre un truc sympa pour l'eco-acteur avec un petite image genre :
	echo "<p>Merci pour votre participation !<br /> Votre expérience en attente de validation par l'administrateur, à bientôt !</p><br /><a href=". base_url('home') .">Retour à l'accueil</a>";
else
	echo "Aucune expérience ne correspond.";
?>