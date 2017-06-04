<?php
	
	//MODIFICATION DU PROFIL VETERINAIRE

	require_once '../utilities/connect_db.php';
	session_start();
	$id_user=$_SESSION['id_user'];
	$valider = $_POST['Valider'];
	if($valider == 'Valider')
	{
		$login = $_POST['login'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$mail = $_POST['mail'];


		$sql=$db->query("UPDATE veterinaire SET LOGIN = '".$login."',
								NOM='".$nom."',
								prenom='".$prenom."',
								mail='".$mail."'
								WHERE id_user='".$_SESSION['id_user']."'");	
	}
	header('Location: ../indexv.php');
?>