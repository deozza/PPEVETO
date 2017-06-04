<?php	
session_start();
require_once '../utilities/connect_db.php';
			$valider = $_POST['Valider'];
			if($valider == 'Valider')
			{
				$nomm = $_POST['nomm'];
				$prixm = $_POST['prixm'];
				$stock = $_POST['stock'];

				//ENREGISTRE LA MODIFICATION

				$sql=$db->query("UPDATE medicament SET nomm = '".$nomm."',
									prixm = '".$prixm."',
									stock = '".$stock."'
									WHERE numm='".$_SESSION['numm']."'");
}

switch($_SESSION['type'])
	{
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