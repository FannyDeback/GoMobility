<div id="col-gauche">
	<section class="derniere-experience">
		<h1><strong>La dernière</strong> expérience</h1>
		<?php
		if (isset($exp))
		{
			$url = base_url("experience");
			echo '<h2>'.$exp->titre.'</h2>
				  <h4><strong>Départ :</strong> '.$exp->start.' | <strong>Arrivée :</strong> '.$exp->arrival.'</h4>
				  <h3>'.$exp->type. /* A REMPLACER PAR LA DATE */'</h3>
				  <p>' . $exp->description . '</p>
				  <h5><strong>Gaz à effet de serre :</strong> '.$exp->ges.'</h5><br/>
				  <a href="'.$url.'/'.$exp->id.'" id="en-savoir-plus">En savoir plus</a>
				  <div class="clear"></div>';
		}
		else
		{
			echo "Pas d'expérience trouvée";
		}
		?>
	</section>

	<section class="dix-dernieres-experiences">
		<h1><strong>Les 10 dernières</strong> expériences</h1>
			<section class="derniere-experience">
				<div id="map-canvas">
					<p>Un problème est survenue lors du chargement de la map...</p>
				</div>
			</section>
		<?php
		if (isset($exp)) {
				echo '
					<script type="text/javascript">
					$(function() {
						show_marker();
					});
					</script>';
			?>
			<script type="text/javascript" src="<?php echo js_url('maps'); ?>">
			</script>
		<?php
		}
		else {
			echo "Aucune expérience ne correspond.";
		}
		?>
	</section>
</div>
