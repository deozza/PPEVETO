<?php		
	require_once '../utilities/connect_db.php';

	$valider = $_POST['Valider'];
	if($valider == 'Valider')
	{
		$prixms=$_POST['prixms'];
		$commentaires=$_POST['commentaires'];
		//ENREGISTRE

		$sql = $db->query("INSERT INTO soins(prixms,commentaires) VALUES ($prixms','$commentaires')");
	
		header('Location: ../soins/index.php');
	}
?>	