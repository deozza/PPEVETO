<?php		
		require_once '../utilities/connect_db.php';

		$valider = $_POST['Valider'];
		if($valider == 'Valider')
		{
			$NOMA=$_POST['noma'];
			$NOMP=$_POST['nomP'];
			$PRENOMP = $_POST['prenomP'];
			$NOMV=$_POST['nomV'];
			$PRENOMV = $_POST['prenomV'];
			$DATEC=$_POST['datec'];
			$HEUREC=$_POST['heurec'];
			$MOTIF = $_POST['motif'];

			$numa = $db ->query('SELECT numa FROM animal WHERE noma="'.$NOMA.'"');
			$datanum = $numa->fetch();

			$id_user = $db ->query('SELECT id_user FROM veterinaire WHERE nom="'.$NOMV.'" AND prenom="'.$PRENOMV.'"');
			$dataid = $id_user->fetch();

			if($dataid==false || $datanum ==false)
			{
				echo'<p>Veuillez rentrer des noms valides.</p>
			<p>Cliquer <a href="./formulaire.php">ici</a> pour revenir à la page d ajout</p>';
			}
			else
			{
				$sql = $db->query("CALL verifRDV($id_user,'$nomP','$prenomP',$numa,'$datec','$heurec','$motif')");
				if(!$sql)
				{
					print_r($db->errorInfo());
					echo "\n <p>Cliquer <a href='./formulaire.php'>ici</a> pour revenir à la page d ajout</p>";
				}else
				{
					$proc = $db->query("CALL statHospitalisation($numa)");
				}
			}

				//header('Location: ../indexs.php');
		}
?>	