<?php

	//CONTROLEUR DE CONNEXION

	require_once 'connect_db.php';

	$valider = $_POST['Valider'];
	if($valider == 'Valider')
	{
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		$mdp_crypt = md5($mdp);

		//VERIFIE QUE LES CHAMPS SONT EXACTS

		$sql = $db->query('SELECT id_user,nom,prenom FROM t_user WHERE login = "'.$login.'" AND mdp = "'.$mdp_crypt.'"');
		$nb = $sql->rowCount();
		$data=$sql->fetch();

		echo $data['nom'];

		if($nb == 0)
		{
			header ('Location: ./index.php?erreur=invalide');
		}
		else
		{

			//RENTRE LES PRIVILEGES SELON L'UTILISATEUR

			$auth = $db->query('SELECT idtype FROM t_user WHERE t_user.id_user="'.$data['id_user'].'"');
			$auths = $auth->fetch();
			$idtype = $auths['idtype'];

			$compteur = $db->query("CALL connexion('".$login."','".$mdp_crypt."')");	

			//REDIRIGE SELON LE PRIVILEGE	


			switch ($idtype) {
				case 1:
					session_start();
					$_SESSION['type'] = $idtype;
					header ('Location: /veto1/gestion/index.php');
					break;
				
				case 2:
					session_start();
					$_SESSION['type'] = $idtype;
					$id = $db->query('SELECT id_user FROM proprietaire WHERE proprietaire.nom="'.$data['nom'].'"');
					$ids = $id->fetch();
					$id_user=$ids['id_user'];
					$_SESSION['id_user'] = $id_user;
					header ('Location: /veto1/gestion/indexp.php');


					break;

				case 3:
					session_start();
					$_SESSION['type'] = $idtype;
					$id = $db->query('SELECT id_user FROM veterinaire WHERE veterinaire.nom="'.$data['nom'].'"');
					$ids = $id->fetch();
					$id_user=$ids['id_user'];
					$_SESSION['id_user'] = $id_user;
					header ('Location: /veto1/gestion/indexv.php');
					break;

				case 4:
					session_start();
					$_SESSION['type'] = $idtype;
					$id = $db->query('SELECT id_user FROM secretaire WHERE secretaire.nom="'.$data['nom'].'"');
					$ids = $id->fetch();
					$id_user=$ids['id_user'];
					$_SESSION['id_user'] = $id_user;
					header ('Location: /veto1/gestion/indexs.php');
					break;
			}				
		}
	}
?>