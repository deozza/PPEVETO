<?php
	require_once '../utilities/header.php';

	$destinataire = 'jre49415@dsiay.com';
	$message_envoye = 'Votre message a été envoyé.';
	$message_erreur = "Une erreur est survenue, l'envoi a échoué.";

	if(!isset($_POST['envoi']))
	{
		echo "Vous devez envoyer le formulaire.";
	}else
	{
		$nom = $_POST['nom'];
		$email = $_POST['email'];
		$objet = $_POST['objet'];
		$message = $_POST['message'];

		if(filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $email)) // On filtre les serveurs qui rencontrent des bogues.
			{
 	   			$passage_ligne = "\r\n";
 	   		}else
 	   		{
 	   			$passage_ligne = "\n";
 	   		}
			
 	   		//=====Création de la boundary
			$boundary = "-----=".md5(rand());
			/*
			$headers = 'From:'.$email."\r\n".
						'Reply-To: '.$email."\r\n" .
						'X_Mailer: PHP/'. phpversion();
			*/
			$header = "From: ".$nom."<".$email.">".$passage_ligne;
			$header.= "Reply-to: ".$nom."<".$email.">".$passage_ligne;
			$header.= 'X_Mailer: PHP/'. phpversion();
			$header.= "MIME-Version: 1.0".$passage_ligne;
			$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;


			$contenu = $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format texte.
			$contenu.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
			$contenu.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$contenu.= $passage_ligne.$message.$passage_ligne;

			mail($destinataire, $objet, $contenu, $header);
			echo 'Message envoyé. Cliquer <a href="../index.php">ici</a> pour revenir à la page d accueil.</p>';
		}else
		{
			echo 'Le mail est invalide, veuillez <a href="./index.php">recommencer</a>';
		}
	}
?>