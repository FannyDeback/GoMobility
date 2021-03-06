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

		if (isset($commentaires))
		{
			echo '</br></br><h3><strong>COMMENTAIRES :</strong></h3>';
			foreach ($commentaires as $commentaire) {
				echo '</br>';
				echo '<section class="commentaires">';
				echo    '<div class="image">';
				echo 		image('profil.png');
				echo    '</div>';

				echo    '<div class="infos">';
				echo    	'<h2>'.$commentaire->auteur.'</h2>';
				echo    	'<h3>'.$commentaire->date.'</h3>';
				echo    	'<p>'.$commentaire->message.'</p>';
				echo    '</div>';
				echo    '<div class="clear"></div>';
				echo '</section>';
			}
		}
		else
			echo "<br/><br/>
				  Soyez le premier à donner <strong>votre avis sur cet expérience !</strong><br/><br/>";


		echo '</br><h3><strong>LAISSER UN COMMENTAIRE :</strong></h3><br/>';	  
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
	// mettre un truc sympa pour l'eco-acteur avec un petite image genre :
	echo '<div id="col-gauche">
		  	<h2>Merci pour votre participation !</h2>
		 	<p>Votre expérience en attente de validation par l\'administrateur, à bientôt !</p>
		 	<a href="'. base_url('home') .'" id="en-savoir-plus">Retour à l\'accueil</a>
		 </div>';
else
	echo "Aucune expérience ne correspond.";
?>