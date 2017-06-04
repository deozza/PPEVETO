<?php		
		require_once '../utilities/connect_db.php';
		session_start();
		$valider = $_POST['Valider'];
		if($valider == 'Valider')
		{
			$id_user=$_SESSION['id_user'];
			$NOMA=$_POST['noma'];
			$DATENAISSA=$_POST['datenaissa'];
			$TATOUAGE=$_POST['tatouage'];
			$RACE = $_POST['race'];
			if(empty($_POST['noma'])||empty($_POST['datenaissa'])||empty($_POST['tatouage'])||empty($_POST['tatouage']))
			{
				echo 
				'<p>Vous devez remplir tous les champs</p>
				<p>Cliquer <a href="/veto1/gestion/index.php">ici</a> pour revenir à la page d ajout</p>';
			}else
			{
				
				$sql = $db->query("CALL ajoutAnimal($id_user,'$RACE','$NOMA','$DATENAISSA','$TATOUAGE')");
			}
				header('Location: /veto1/gestion/indexp.php');
		}
?>	