<div class="container">
<section id="animaux">        
        <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="row">
                </br></br></br></br></br></br></br></br>
                

            <table class="animaux" border=1>                    

<?PHP
	#session_start();
	
	if (isset($_GET['typeuser']))
	{
		$typeUSer = $_GET['typeuser'];
	}
	else 
	{
		$typeUSer = $_SESSION['type'];
	}
	switch($typeUSer) {
		case 1:

			echo "<h1>Les animaux</h1>";

			$sql = $db ->query('SELECT animal.numa,animal.noma, animal.datenaissa, animal.tatouage, animal.nbConsultation, animal.nbHospitaliser, proprietaire.nom,proprietaire.prenom, race.nomr FROM animal
							INNER JOIN proprietaire ON animal.id_user=proprietaire.id_user
							INNER JOIN race ON animal.numr=race.numr
							GROUP BY animal.numa');
			$nb=$sql->rowCount();

			echo "<tr><th>Modifier</th><th>Supprimer</th>
						<th>Nom</th>
						<th>Race</th>
						<th>Date de naissance</th>
						<th>Tatouage</th>
						<th>Nombre de consulations</th>
						<th>Nombre d'hospitalisations</th>
						<th>Nom du proprietaire</th>
						<th>Prenom du proprietaire</th>
						</tr>";

			while($data = $sql->fetch())
			{
				echo "<tr>";
				echo "<td>".'<a href="./mod.php?numa='.$data['numa'].'"><input type="button" value="Modifier"></a>'."</td>";
				echo "<td>".'<a href="./delete.php?numa='.$data['numa'].'"><input type="button" value="Supprimer"></a>'."</td>";
				echo "<td>".$data['noma'] ."</td>";		
				echo "<td>".$data['nomr'] ."</td>";
				echo "<td>".$data['datenaissa'] ."</td>";
				echo "<td>".$data['tatouage'] ."</td>";
				echo "<td>".$data['nbConsultation'] ."</td>";
				echo "<td>".$data['nbHospitaliser'] ."</td>";
				echo "<td>".$data['nom'] ."</td>";
				echo "<td>".$data['prenom'] ."</td>";
				echo "<tr>";
			}
			$sql->CloseCursor();
		break;
		
		case 2:

			echo "<h1>Mes animaux</h1>";

			$sql = $db ->query('SELECT animal.numa,animal.noma,animal.nbConsultation, animal.nbHospitaliser FROM animal
							INNER JOIN proprietaire ON animal.id_user=proprietaire.id_user
							WHERE animal.id_user ="'.$_SESSION['id_user'].'"');
			$nb=$sql->rowCount();

			echo "<tr>
						<th><center>Nom</center></th>
						<th><center>Nombre de consulations ce mois</center></th>
						<th><center>Nombre d'hospitalisations ce mois</center></th>			
						<th><center>Carnet de santé</center></th>
						</tr>";

			while($data = $sql->fetch())
			{
				echo "<tr>";
				echo "<td>".$data['noma'] ."</td>";
				echo "<td>".$data['nbConsultation'] ."</td>";
				echo "<td>".$data['nbHospitaliser'] ."</td>";		
				echo "<td>".'<a href="./gestion_animal/carnet.php?numa='.$data['numa'].'"><input type="button" value="Voir"></a>'."</td>";
				echo "<tr>";
			}
			$sql->CloseCursor();

		
			echo"<a href='./gestion_animal/formulaire.php'><input style='margin-left: 10px;' type='button' value='Ajout'></a>";
		break;

		case 3:
	require_once '../utilities/connect_db.php';

	?>

	<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Allo-Veto : clinique vétérinaire</title>

    <!-- Bootstrap Core CSS -->
    <link href="/veto1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/veto1/css/bootstrap.css" rel="stylesheet">

    <link href="/veto1/css/full-slider.css" rel="stylesheet">
</head>

    <!-- Bootstrap Core JavaScript -->
<body>
<script src="/veto1/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="/veto1/js/bootstrap.min.js"></script>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <li class='op-v-item'><a class='op-v-link' href='/veto1/gestion/indexv.php'>Retour à l'index</a></li>;
			</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div class="container">
<section id="animaux">        
        <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="row">
                </br></br></br>
                <div class="container">
    <div class="page-header">

			<?php

			$sql = $db ->query('SELECT proprietaire.id_user, animal.numa,animal.noma, animal.datenaissa, animal.tatouage, animal.nbConsultation, animal.nbHospitaliser, proprietaire.nom,proprietaire.prenom, race.nomr FROM animal
							INNER JOIN proprietaire ON animal.id_user=proprietaire.id_user
							INNER JOIN race ON animal.numr=race.numr
							WHERE animal.id_user ="'.$_GET['id_user'].'"
							GROUP BY animal.numa');
			$nb=$sql->rowCount();

			echo "<tr>
						<th><center>Nom</center></th>
						<th><center>Nombre de consulations ce mois</center></th>
						<th><center>Nombre d'hospitalisations ce mois</center></th>
						<th><center>Nom du proprietaire</center></th>
						<th><center>Prenom du proprietaire</center></th>
						<th><center>Carnet de santé</center></th>
						</tr>";

			while($data = $sql->fetch())
			{
				echo "<tr>";
				echo "<td>".$data['noma'] ."</td>";
				echo "<td>".$data['nbConsultation'] ."</td>";
				echo "<td>".$data['nbHospitaliser'] ."</td>";
				echo "<td>".$data['nom'] ."</td>";
				echo "<td>".$data['prenom'] ."</td>";
				echo "<td>".'<a href="./carnet.php?numa='.$data['numa'].'"><input type="button" value="Voir"></a>'."</td>";
				echo "<tr>";
			}
			$sql->CloseCursor();
		break;
	}
?>
</table>
</div>
</div>
</section>
</br></br></br></br></br></br></br></br>