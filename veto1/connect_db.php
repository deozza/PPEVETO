<?php
	//CONNEXION A LA BDD
	try{
	$db = new PDO('mysql:host=127.0.0.1;dbname=ptiveto','root','');
	}catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
?>
