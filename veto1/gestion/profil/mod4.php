<?php

	//MODIFICATION DU PROFIL SECRETAIRE

	require_once '../utilities/connect_db.php';
	session_start();
	$valider = $_POST['Valider'];
	$id_user=$_SESSION['id_user'];
	if($valider == 'Valider')
	{
			$login = $_POST['login'];
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$mail = $_POST['mail'];

			$sql=$db->query("UPDATE secretaire SET login = '".$login."',
													nom='".$nom."',
													prenom='".$prenom."',
													mail= '".$mail."'
													WHERE id_user='".$_SESSION['id_user']."'");
	}
	header('Location: ../indexs.php');
?>