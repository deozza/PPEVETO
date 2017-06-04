<?PHP
	require_once '../utilities/connect_db.php';
	session_start();	
	$valider = $_POST['Valider'];
	if($valider == 'Valider')
	{
		$numc = $_SESSION['numc'];
		$datec = $_POST['datec'];
		$heurec = $_POST['heurec'];


		/*$sql=$db->query("UPDATE consultation SET datec = '".$datec."',
												heurec = '".$heurec."'
												WHERE numc='".$_SESSION['numc']."'");*/
	echo $datec, $heurec,$numc;
	}
	//header('Location: ../indexs.php');
?>