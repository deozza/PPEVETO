<?php		
	session_start();
	require_once '../utilities/connect_db.php';
	$_SESSION['url'] =$_SERVER['REQUEST_URI'];
	$_SESSION['numm'] = $_GET['numm'];

	$sql = $db->query("CALL supprimerMedicament(".$_SESSION['numm'].")");
	switch ($_SESSION['type']) {
		case 1:
			header('Location: ../indexa.php');
			break;
		
		case 3:
			header('Location: ../indexv.php');
			break;
		case 4:
			header('Location: ../indexs.php');
			break;
	}
	
?>