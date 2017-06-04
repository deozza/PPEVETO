<?php		
	session_start();
	require_once '../utilities/connect_db.php';
	$_SESSION['url'] =$_SERVER['REQUEST_URI'];
	$numc = $_GET['numc'];

	$sql = $db->query("CALL annulerRDV($numc)");
	header('Location: ../indexs.php');
?>