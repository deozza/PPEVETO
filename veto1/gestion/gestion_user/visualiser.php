<div class="container">
<section id="client">        
        <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="row">
                </br></br></br></br></br></br>
                <h1>Gestion des proprietaires</h1>
                <table class="client" border=1>
<?PHP
	
	//AFFICHE EN FONCTION DES PRIVILEGES : 1=ADMIN, 2=PROPRIETAIRE, 3=VETERINAIRE, 4=SECRETAIRE
	if (isset($_GET['typeuser']))
	{
		$typeUSer = $_GET['typeuser'];
	}
	else 
	{
		$typeUSer = $_SESSION['type'];
	}
	switch($typeUSer)
	{
		case 1:

		$sql = $db ->query('SELECT t_user.id_user,t_user.login,
							t_user.mail, type.libelle FROM t_user
							INNER JOIN type ON t_user.idtype=type.idtype
							GROUP BY t_user.id_user');
		$nb=$sql->rowCount();

		echo "<tr><th><center>Modifier</center></th><th><center>Supprimer</center></th>
					<th><center>Identifiant de l'utilisateur</center></th>
					<th><center>Login</center></th>
					<th><center>Privilège</center></th></tr>";

		while($data = $sql->fetch())
		{
			echo "<tr>";
			echo "<td>".'<a href="./mod.php?id_user='.$data['id_user'].'">Modifier</a>'."</td>";
			echo "<td>".'<a href="./delete.php?id_user='.$data['id_user'].'">Supprimer</a>'."</td>";
			echo "<td>".$data['id_user'] ."</td>";
			echo "<td>".$data['login'] ."</td>";		
			echo "<td>".$data['libelle'] ."</td>";
			echo "<tr>";
		}
		$sql->CloseCursor();
			echo"<a href='./gestion_user/formulaire1.php'><input style='margin-left: 10px;' type='button' value='Ajout'></a>";


		break;

		case 3:

		$sql = $db ->query('SELECT proprietaire.id_user,proprietaire.login, proprietaire.nom,proprietaire.prenom,
							proprietaire.mail FROM proprietaire
							INNER JOIN consultation ON proprietaire.nom=consultation.nom
							WHERE consultation.id_user="'.$_SESSION['id_user'].'" 
							GROUP BY proprietaire.id_user');
		$nb=$sql->rowCount();

		echo "<tr>
			<th><center>Identifiant du client</center></th>
			<th><center>Login</center></th>
			<th><center>Nom</center></th>
			<th><center>Prénom</center></th>
			<th><center>Mail</center></th>
			<th><center>Voir ses animaux</center></th></tr>";

		while($data = $sql->fetch())
		{
			echo "<tr>";
			echo "<td>".$data['id_user'] ."</td>";
			echo "<td>".$data['login'] ."</td>";		
			echo "<td>".$data['nom'] ."</td>";
			echo "<td>".$data['prenom'] ."</td>";
			echo "<td>".$data['mail'] ."</td>";
			echo "<td>".'<a href="./gestion_animal/visualiser.php?id_user='.$data['id_user'].'&typeuser=3"><input type="button" value="Voir"></a>'."</td>";

			echo "<tr>";
		}

		break;
			
		case 4:

		$sql = $db ->query('SELECT proprietaire.id_user, proprietaire.login, proprietaire.nom, proprietaire.prenom,
							proprietaire.mail FROM proprietaire
							GROUP BY proprietaire.id_user');
		$nb=$sql->rowCount();

		echo "<tr><th><center>Supprimer</center></th>
					<th><center>Login</center></th>
					<th><center>Nom</center></th>
					<th><center>Prénom</center></th>
					<th><center>Mail</center></th>
					</tr>";

		while($data = $sql->fetch())
		{
			echo "<tr>";
			echo "<td>".'<a href="./gestion_user/delete.php?login='.$data['login'].'"><input type="button" value="Supprimer"></a>'."</td>";
			echo "<td>".$data['login'] ."</td>";		
			echo "<td>".$data['nom'] ."</td>";
			echo "<td>".$data['prenom'] ."</td>";
			echo "<td>".$data['mail'] ."</td>";
			echo "<tr>";
		}
		$sql->CloseCursor();
		echo"<a href='./gestion_user/formulaire2.php'><input style='margin-left: 10px;' type='button' value='Ajout'></a>";
		break;

	}
?>
</table>
</div>
</div>
</section>
</br></br></br></br></br></br>