<?php	
	session_start();
	require_once '../utilities/connect_db.php';
		$valider = $_POST['Valider'];
		$type = $_SESSION['type'];
		if($valider == 'Valider')
		{
			$commentaires = $_POST['commentaires'];
			$prixms = $_POST['prixms'];

			//ENREGISTRE LA MODIFICATION

			$sql=$db->query("UPDATE soins SET commentaires = '".$commentaires."',
								prixms = '".$prixms."'
								WHERE nums='".$_SESSION['nums']."'");
		}
	switch ($type) {
			case 3:
				header('Location: ../indexv.php');
				break;
			
			case 4:
				header('Location: ../indexs.php');
				break;
		}
?>