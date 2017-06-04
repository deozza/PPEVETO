<?php
	//include'../utilities/secure.php';
	session_start();
	require_once '../utilities/connect_db.php';
	$_SESSION['url'] =$_SERVER['REQUEST_URI'];	
	$_SESSION['numh'] = $_GET['numh'];

		//ENREGISTRE
		
		$sql=$db->query("UPDATE hospitaliser SET date_sortie = curdate(),
								heure_sortie = curtime()
								WHERE numh = '".$_SESSION['numh']."'");
	header('Location: ../indexv.php');
?>