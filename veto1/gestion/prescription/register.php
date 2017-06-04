<?php		
	session_start();
	require_once '../utilities/connect_db.php';

	$valider = $_POST['Valider'];
	if($valider == 'Valider')
	{
		$id_user = $_SESSION['id_user'];
		$noma=$_POST['noma'];
		$nomm=$_POST['nomm'];
		$posologieem=$_POST['posologieem'];
		$quantiteem=$_POST['quantiteem'];
		$date_prescription=$_POST['date_prescription'];
		$date_fin=$_POST['date_fin'];

		$numa = $db ->query('SELECT numa FROM animal WHERE noma="'.$noma.'"');
		$datanum = $numa->fetch();

		$numm = $db ->query('SELECT numm FROM medicament WHERE nomm="'.$nomm.'"');
		$datanom = $numm->fetch();

		if($numa==false || $numm ==false)
		{
			echo'<p>Veuillez rentrer des noms valides.</p>
		<p>Cliquer <a href="./formulaire.php">ici</a> pour revenir à la page d ajout</p>';
		}
		//ENREGISTRE

		$sql = $db->query("INSERT INTO prescrire VALUES ($id_user,$numm,$numa,'$posologieem',$quantiteem,'$date_prescription','$date_fin')");
		header('Location: ../indexv.php');
	}
?>	