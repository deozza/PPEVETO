<?php		
	require_once '../utilities/connect_db.php';

	$valider = $_POST['Valider'];
	if($valider == 'Valider')
	{
		$nomm=$_POST['nomm'];
		$prixm=$_POST['prixm'];
		$stock=$_POST['stock'];

		//ENREGISTE

		$sql = $db->query("CALL ajoutMedicament('$nomm',$prixm,$stock)");
		header('Location: ../indexv.php');
	}
?>	