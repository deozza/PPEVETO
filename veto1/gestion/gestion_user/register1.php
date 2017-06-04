<?php		

		//REGISTER POUR l'ADMIN

		require_once '../utilities/connect_db.php';

		$valider = $_POST['Valider'];
		if($valider == 'Valider')
		{
			$LOGIN=$_POST['login'];
			$NOM=$_POST['nom'];
			$PRENOM=$_POST['prenom'];
			$MDP=md5($_POST['mdp']);
			$MAIL=$_POST['mail'];
			$idtype = $_POST['type'];

			//VERIFIE QUE TOUS LES CHAMPS SONT REMPLIS

			if(empty($_POST['type'])||empty($_POST['login'])||empty($_POST['nom'])||empty($_POST['prenom'])||empty($_POST['mdp'])||empty($_POST['mail']))
			{
				echo 
				'<p>Vous devez remplir tous les champs</p>
				<p>Cliquer <a href="./index.php">ici</a> pour revenir à la page d ajout</p>';
			}else
			{
				//ENREGISTRE EN FONCTION DU PRIVILEGE DU PROCHAIN UTILISATEUR

				switch($idtype)
				{
					case 2:
						$sql = $db->query("INSERT INTO PROPRIETAIRE (id_user,login,nom, prenom,mdp,mail) VALUES ('','$LOGIN','$NOM','$PRENOM','$MDP','$MAIL')");
					break;

					case 3:
						$sql = $db->query("INSERT INTO VETERINAIRE (id_user,login,nom, prenom,mdp,mail) VALUES ('','$LOGIN','$NOM','$PRENOM','$MDP','$MAIL')");
					break;
					case 4:
						$sql = $db->query("INSERT INTO SECRETAIRE (id_user,login,nom, prenom,mdp,mail) VALUES ('','$LOGIN','$NOM','$PRENOM','$MDP','$MAIL')");
					break;
				}

				header('Location: ../gestion_user/index.php');
			}
		}
?>	