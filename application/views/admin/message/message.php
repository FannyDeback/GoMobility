<div id="col-droite-admin">
<h1><strong>Détail</strong> du message de <?php echo $message->nom; ?></h1>
<?php
	if (isset($message))
	{
		echo '<h2>'.$message->nom.'</h2>';
		echo '<h4>'.$message->email.'</h4>';
		echo '<p>'.$message->message.'</p>';
	}
	else
	{
		echo "Aucun message correspondant.";
	}
?>

</div>
<div class="clear"></div>