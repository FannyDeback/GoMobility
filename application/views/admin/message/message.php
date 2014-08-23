<?php
	if (isset($message))
	{
		echo $message->email;
	}
	else
	{
		echo "Aucun message correspondant.";
	}
?>