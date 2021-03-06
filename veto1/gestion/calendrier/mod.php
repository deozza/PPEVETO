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
                    <li class="op-v-item"><a class="op-v-link" href="/veto1/gestion/indexv.php">Retour à l'index</a></li>
 </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div class="container">
<section id="profil">        
        <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="row">
                </br></br>
                <h1>Modifier un rendez-vous</h1>
<?php		
	require_once '../utilities/connect_db.php';

	$_SESSION['url'] =$_SERVER['REQUEST_URI'];	
	$_SESSION['numc'] = $_GET['numc'];

	$infos=array();
			$sql = $db ->query('SELECT 
							consultation.datec, consultation.heurec
							FROM consultation
							WHERE numc="'.$_SESSION['numc'].'"');
			while($data=$sql->fetch())
			{
				$info[]=$data;
			}

			foreach($info as $infos)
			{
				?>

				<div id="general">
					<div id="modConsult">
						<form method='POST' action='update.php'>
							<label for='datec'>Changer la date :</label>
							<input required type="date" name="datec" value="<?php echo $infos['datec']; ?>"><br/><br/>
							<label for='heurec'>Changer l'heure :</label>
							<input required type="datetime" name="heurec" value="<?php echo $infos['heurec']; ?>"><br/><br/>
							<input type='submit' value='Valider' name='Valider'>
						</form>
					</div>
				</div>
<?php
				}
				$sql->CloseCursor();
				?>