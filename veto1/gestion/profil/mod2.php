<?php

	//MODIFICATION DU PROFIL PROPRIETAIRE

	require_once '../utilities/connect_db.php';
	session_start();
	$id_user=$_SESSION['id_user'];
	$valider = $_POST['Valider'];
	if($valider == 'Valider')
	{
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$mail = $_POST['mail'];
		$adrp = $_POST['adrp'];
		$codep = $_POST['codep'];
		$villep = $_POST['villep'];
		$telp = $_POST['telp'];

		$sql=$db->query("UPDATE proprietaire SET LOGIN = '".$login."',
								NOM='".$nom."',
								prenom='".$prenom."',
								mdp='".$mdp."',
								mail='".$mail."',
								adrp='".$adrp."',
								codep='".$codep."',
								villep='".$villep."',
								telp='".$telp."'
								WHERE id_user='".$_SESSION['id_user']."'");
	}
	header('Location: ../indexp.php');
?>
