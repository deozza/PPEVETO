<?php		
		require_once '../utilities/connect_db.php';

		$valider = $_POST['Valider'];
		if($valider == 'Valider')
		{
			$LOGIN=$_POST['login'];
			$NOM=$_POST['nom'];
			$PRENOM=$_POST['prenom'];
			$MDP=md5($_POST['mdp']);
			$MAIL=$_POST['mail'];

			//ENREGISTRE LE PROPRIETAIRE

			$sql = $db->query("CALL ajoutProprietaire('','$LOGIN','$NOM','$PRENOM','$MDP','$MAIL')");
				
			header('Location: ../indexs.php');
		}
?>	