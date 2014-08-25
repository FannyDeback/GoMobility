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
	<?php
		// Erreur d'instanciation de Akismet
		if (isset($erreur))
			echo $erreur;

		// Formulaire d'envoie de nouveau commentaire
		echo form_open('experience/'.$id);

		echo form_label('Email<span>*</span>', 'email');
		echo form_input(array(
			'id' => 'email',
			'name' => 'email',
			'value' => set_value('email')
		));
		echo form_error('email');

		echo "<br/><br/><br/>";

		echo form_label('Votre message<span>*</span>', 'titre');
		echo form_textarea(array(
			'id' => 'message',
			'name' => 'message',
			'value' => set_value('message')
		));
		echo form_error('message');

		echo "<br/><br/><br/>";

		echo form_label('Auteur', 'auteur');
		echo form_input(array(
			'id' => 'auteur',
			'name' => 'auteur',
			'value' => set_value('auteur')
		));

		echo "<br/><br/><br/>";

		echo form_label('Website', 'website');
		echo form_input(array(
			'id' => 'website',
			'name' => 'website',
			'value' => set_value('website')
		));

		echo form_submit('submit', 'Commenter');
		echo form_close();

		if (isset($commentaires))
		{
			foreach ($commentaires as $commentaire) {
				var_dump($commentaire);
			}
		}
		else
			echo "Soyez le premier à donner votre avis sur cet expérience...";
	?>
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
	echo "Expérience en attente de validation par l'administrateur.";
else
	echo "Aucune expérience ne correspond.";
?>