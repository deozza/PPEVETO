<?php		
	require_once '../utilities/connect_db.php';
	$_SESSION['url'] =$_SERVER['REQUEST_URI'];
	$_SESSION['login']= $_GET['login'];

		$sql = $db->query("DELETE FROM proprietaire WHERE login = '".$_SESSION['login']."';");
		header('Location: ../indexs.php');
?>