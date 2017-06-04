<?php		
	require_once '../utilities/connect_db.php';
	session_start();
	$valider = $_POST['Valider'];
	if($valider == 'Valider')
	{
		$date_entree=date('Y-m-d');
		$heure_entree=date('H:i:s');
		$noma=$_POST['noma'];
		$commentaires=$_POST['commentaires'];
		$id_user = $_SESSION['id_user'];
		
		$numa = $db->query('SELECT numa FROM animal WHERE noma="'.$noma.'"');
		$datanuma = $numa->fetch();
		$num= $datanuma['numa'];

		echo $date_entree;
		echo $heure_entree;
		echo $num;
		echo $commentaires;
		$sql = $db->query("INSERT INTO hospitaliser(date_entree, heure_entree, commentaires, numa,id_user) VALUES ('$date_entree','$heure_entree','$commentaires',$num,$id_user)");

		$proc = $db->query('CALL statConsultation($num)');

		header('Location: ../indexv.php');
	}
?>	