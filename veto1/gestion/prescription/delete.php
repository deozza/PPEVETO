<?php		
	require_once '../utilities/connect_db.php';
	$_SESSION['url'] =$_SERVER['REQUEST_URI'];
	$_SESSION['numm'] = $_GET['numm'];

		$sql = $db->query("DELETE FROM soin WHERE nums =".$_SESSION['nums']."");
		header('Location: ../tarif/index.php');
?>