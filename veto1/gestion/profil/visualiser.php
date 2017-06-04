<div class="container">
<section id="profil">        
        <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="row">
                </br></br>
                <h1>Mon profil</h1>
<?PHP

	//AFFICHE LE PROFIL SELON LE PRIVILEGE 1=ADMIN, 2=PROPRIETAIRE, 3=VETO, 4=SECRETAIRE

	switch($_SESSION['type'])
	{
		case 2:

			//RECUPERE LES INFOS

			$infos=array();
			$sql = $db ->query('SELECT proprietaire.login,
							proprietaire.mdp,
							proprietaire.nom,proprietaire.prenom,
							proprietaire.mail,proprietaire.adrp,
							proprietaire.codep, proprietaire.villep,proprietaire.telp
							FROM proprietaire
							WHERE id_user="'.$_SESSION['id_user'].'"');
			while($data=$sql->fetch())
			{
				$info[]=$data;
			}

			//AFFICHE LE PROFIL

			foreach($info as $infos)
			{
				?>
				<form method='POST' action='./profil/mod2.php'>
					<label for='login'>Changer le login :</label>
					<input type="text" name="login" value="<?php echo $infos['login']; ?>"><br/><br/>
					<label for='login'>Changer le mot de passe :</label>
					<input type="password" name="mdp" value="<?php echo $infos['mdp']; ?>"><br/><br/>
					<label for='nom'>Changer le nom :</label>
					<input type="text" name="nom" value="<?php echo $infos['nom']; ?>"><br/><br/>
					<label for='prenom'>Changer le prénom :</label>
					<input type="text" name="prenom" value="<?php echo $infos['prenom']; ?>"><br/><br/>
					<label for='mail'>Changer le mail :</label>
					<input type="text" name="mail" value="<?php echo $infos['mail']; ?>"><br/><br/>
					<label for='adrp'>Changer l'adresse :</label>
					<input type="text" name="adrp" value="<?php echo $infos['adrp']; ?>"><br/><br/>
					<label for='codep'>Changer le code postal :</label>
					<input type="text" name="codep" value="<?php echo $infos['codep']; ?>"><br/><br/>
					<label for='villep'>Changer la ville :</label>
					<input type="text" name="villep" value="<?php echo $infos['villep']; ?>"><br/><br/>
					<label for='villep'>Changer le téléphone :</label>
					<input type="text" name="telp" value="<?php echo $infos['telp']; ?>"><br/><br/>
				<input type='submit' value='Valider' name='Valider'>
			</form>
		<?PHP
			}
		$sql->CloseCursor();
		break;

		case 3:
		$infos=array();

			//RECUPERE LES INFOS

			$sql = $db ->query('SELECT veterinaire.login, veterinaire.mdp,
							veterinaire.nom,veterinaire.prenom,
							veterinaire.mail
							FROM veterinaire
							WHERE id_user="'.$_SESSION['id_user'].'"');

			while($data=$sql->fetch())
			{
				$info[]=$data;
			}

			//AFFICHE LE PROFIL

			foreach($info as $infos)
			{
				?>
				<form method='POST' action='./profil/mod3.php'>
					<label for='login'>Changer le login :</label>
					<input type="text" name="login" value="<?php echo $infos['login']; ?>"><br/><br/>
					<label for='login'>Changer le mot de passe :</label>
					<input type="password" name="mdp" value="<?php echo $infos['mdp']; ?>"><br/><br/>
					<label for='nom'>Changer le nom :</label>
					<input type="text" name="nom" value="<?php echo $infos['nom']; ?>"><br/><br/>
					<label for='prenom'>Changer le prénom :</label>
					<input type="text" name="prenom" value="<?php echo $infos['prenom']; ?>"><br/><br/>
					<label for='mail'>Changer le mail :</label>
					<input type="text" name="mail" value="<?php echo $infos['mail']; ?>"><br/><br/>
				<input type='submit' value='Valider' name='Valider'>
			</form>
		<?PHP
			}

			$sql->CloseCursor();
		break;

		case 4:
		$infos=array();

			//RECUPERE LES INFOS

			$sql = $db ->query('SELECT secretaire.login, secretaire.mdp,
							secretaire.nom,secretaire.prenom,
							secretaire.mail
							FROM secretaire
							WHERE id_user="'.$_SESSION['id_user'].'"');

			while($data=$sql->fetch())
			{
				$info[]=$data;
			}

			//AFFICHE LE PROFIL

			foreach($info as $infos)
			{
				?>
				<form method='POST' action='./profil/mod4.php'>
					<label for='login'>Changer le login :</label>
					<input type="text" name="login" value="<?php echo $infos['login']; ?>"><br/><br/>
					<label for='login'>Changer le mot de passe :</label>
					<input type="password" name="mdp" value="<?php echo $infos['mdp']; ?>"><br/><br/>
					<label for='nom'>Changer le nom :</label>
					<input type="text" name="nom" value="<?php echo $infos['nom']; ?>"><br/><br/>
					<label for='prenom'>Changer le prénom :</label>
					<input type="text" name="prenom" value="<?php echo $infos['prenom']; ?>"><br/><br/>
					<label for='mail'>Changer le mail :</label>
					<input type="text" name="mail" value="<?php echo $infos['mail']; ?>"><br/><br/>
				<input type='submit' value='Valider' name='Valider'>
			</form>
		<?php
			}

			$sql->CloseCursor();
		break;
	}
?>
</div>
</div>
</section>