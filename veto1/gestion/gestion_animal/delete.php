<?php		
	require_once '../utilities/connect_db.php';
	$_SESSION['url'] =$_SERVER['REQUEST_URI'];
	$_SESSION['numa'] = $_GET['numa'];

		$sql = $db->query("DELETE FROM animal WHERE numa =".$_SESSION['numa']."");
		header('Location: ../gestion_user/index.php');
?>