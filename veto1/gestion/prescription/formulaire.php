<?php
	session_start();
	require_once '../utilities/secure.php';
    require_once'../utilities/connect_db.php';
?>
<!DOCTYPE html>
<html lang="fr">

<!-- FORMULAIRE POUR SECRETAIRE -->

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
                    <li class="op-v-item"><a class="op-v-link" href="/veto1/gestion/indexv.php">Retour à l'index</a></li>
 </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div class="container">
</br></br></br></br>
<table class="animaux" border=1>  

<?php
    $sql = $db ->query('SELECT animal.numa,animal.noma, animal.datenaissa, animal.tatouage, animal.nbConsultation, animal.nbHospitaliser, proprietaire.nom,proprietaire.prenom, race.nomr FROM animal
                            INNER JOIN proprietaire ON animal.id_user=proprietaire.id_user
                            INNER JOIN race ON animal.numr=race.numr
                            GROUP BY animal.numa');
        $nb=$sql->rowCount();

        echo "<tr>
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
?>
</table>
<table class="medicament" border=1>
<?PHP
    $sql = $db ->query('CALL visuMedicament');
    $nb=$sql->rowCount();

    echo "<tr>
                <th>Médicament</th>
                <th>Prix unitaire(€)</th>
                <th>Stock</th></tr>";

    while($data = $sql->fetch())
    {
        echo "<tr>";
        echo "<td>".$data['nomm'] ."</td>";     
        echo "<td>".$data['prixm'] ."</td>";
        echo "<td>".$data['stock'] ."</td>";
        echo "<tr>";
    }
    $sql->CloseCursor();   
?> 
</table>
<div id="ajoutMedoc">       
        <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="row">
                </br></br>
                <h1>Ajouter une prescription</h1>
				<form method="POST" action='register.php'>
					<label for="noma">Animal : </label>
					<input required type="text" name ="noma"></br>
					
					<label for="nomm">Médicament : </label>
					<input required type="text" name ="nomm"></br>

					<label for="posologieem">Posologie : </label>
					<input required type="text" name ="posologieem"></br>

					<label for="quantiteem">Quantitée : </label>
					<input required type="int" name ="quantiteem"></br>

					<label for="date_prescription">Début du traitement : </label>
					<input required type="date" name ="date_prescription"></br>

					<label for="date_fin">Fin du traitement : </label>
					<input required type="date" name ="date_fin"></br>

					<input type="submit" name ="Valider" value="Valider" />
				</form>
</div>
</div>
</section>
 <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Allo-Veto, </p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
</body>

</html>