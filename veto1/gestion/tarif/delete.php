<?php		
	session_start();

	require_once '../utilities/connect_db.php';
	$_SESSION['url'] =$_SERVER['REQUEST_URI'];
	$_SESSION['nums'] = $_GET['nums'];
	$type = $_SESSION['type'];

	$sql = $db->query("DELETE FROM soins WHERE nums =".$_SESSION['nums']."");
		
	switch ($type) {
		case 3:
			header('Location: ../indexv.php');
			break;
		
		case 4:
			header('Location: ../indexs.php');
			break;
	}
?>