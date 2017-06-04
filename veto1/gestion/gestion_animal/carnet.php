<?php
	require_once '../utilities/connect_db.php';
	session_start();
	$_SESSION['url'] =$_SERVER['REQUEST_URI'];	
	$_SESSION['numa'] = $_GET['numa'];
	$type = $_SESSION['type']
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

                <?php
                	switch ($type) {
                		case 2:
                			echo "<li class='op-v-item'><a class='op-v-link' href='/veto1/gestion/indexp.php'>Retour à l'index</a></li>";
                			break;
                		
                		case 3:
                			echo "<li class='op-v-item'><a class='op-v-link' href='/veto1/gestion/indexv.php'>Retour à l'index</a></li>";
                			break;
                	}
                ?>
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
	<h1>Carnet de santé</h1>
	</div>
    <div class="row">
    	<div class="col-md-6">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab">Animal</a></li>
                            <li><a href="#tab2default" data-toggle="tab">Prescriptions</a></li>
                            <li><a href="#tab3default" data-toggle="tab">Consultations</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
                        		<?php

					           		$animal = $db ->query('SELECT animal.numa,animal.noma, animal.datenaissa, animal.tatouage,animal.nbConsultation, animal.nbHospitaliser, race.nomr FROM animal
												INNER JOIN proprietaire ON animal.id_user=proprietaire.id_user
												INNER JOIN race ON animal.numr=race.numr
												WHERE animal.numa ="'.$_SESSION['numa'].'"');
									while($data=$animal->fetch())

									{
										$info[]=$data;
									}

									foreach($info as $infos)
									{	
										?>
											<label for='noma'>Nom : </label>
											<input type="text" name="noma" value="<?php echo $infos['noma']; ?>"><br/><br/>
											<label for='datenaissa'>Date de naissance : </label>
											<input type="date" name="datenaissa" value="<?php echo $infos['datenaissa']; ?>"><br/><br/>
											<label for='tatouage'>Tatouage : </label>
											<input type="text" name="tatouage" value="<?php echo $infos['tatouage']; ?>"><br/><br/>
											<label for='race'>Race : </label>
											<input type="text" name="race" value="<?php echo $infos['nomr']; ?>">
								<?PHP
									}
								?>
                        </div>
                        <div class="tab-pane fade" id="tab2default">
                        	<table class="prescription" border=1> 
                        		<?php

					           		$prescrire = $db ->query('SELECT prescrire.numa,prescrire.numm, prescrire.posologiem, prescrire.quantiteem, prescrire.date_prescription, prescrire.date_fin, medicament.nomm
														FROM prescrire
														INNER JOIN medicament ON prescrire.numm=medicament.numm
														INNER JOIN animal ON prescrire.numa=animal.numa
														WHERE animal.numa="'.$_SESSION['numa'].'"');
									$nb=$prescrire->rowCount();

									if($nb==0)
									{
										echo'<p>Vous n\'avez pas encore de prescription.</p>';
									}else
									{
										?><div id="visuConsultation"><?PHP
										echo "<tr>
													<th><center>Medicament</center></th>
													<th><center>Posologie</center></th>
													<th><center>Quantite</center></th>
													<th><center>Debut du traitement</center></th>
													<th><center>Fin du traitement</center></th></tr>";

										while($data = $prescrire->fetch())
										{
											echo "<tr>";	
											echo "<td>".$data['nomm'] ."</td>";
											echo "<td>".$data['posologiem'] ."</td>";
											echo "<td>".$data['quantiteem'] ."</td>";
											echo "<td>".$data['date_prescription'] ."</td>";
											echo "<td>".$data['date_fin'] ."</td>";
											echo "<tr>";
										}
									}	
								?>
								</table>
                        </div>
                        <div class="tab-pane fade" id="tab3default">
                        	<table class="prescription" border=1> 
                        	<?php
	                        	$consultation = $db ->query('SELECT veterinaire.nom,consultation.datec,consultation.heurec,consultation.prixc,consultation.motif,consultation.commentaires
													FROM consultation
													INNER JOIN animal ON consultation.numa=animal.numa
													INNER JOIN veterinaire ON consultation.id_user=veterinaire.id_user
													INNER JOIN proprietaire ON animal.id_user=proprietaire.id_user
													WHERE animal.numa="'.$_SESSION['numa'].'"
													ORDER BY consultation.datec');
								$nb=$consultation->rowCount();

								if($nb==0)
								{
									echo'<p>Vous n\'avez pas encore de consultations.</p>';
								}else
								{

									echo "<tr>
											<th><center>Nom du vétérinaire</center></th>
											<th><center>Date de la consultation (aaaa/mm/jj)</center></th>
											<th><center>Heure de la consultation</center></th>
											<th><center>Prix de la consultation</center></th>
											<th><center>Motif</center></th>
											<th><center>Commentaires</center></th>
										 </tr>";

									while($data = $consultation->fetch())
										{
											echo "<tr>";
											echo "<td>".$data['nom'] ."</td>";
											echo "<td>".$data['datec'] ."</td>";
											echo "<td>".$data['heurec'] ."</td>";
											echo "<td>".$data['prixc'] ."</td>";
											echo "<td>".$data['motif'] ."</td>";
											echo "<td>".$data['commentaires'] ."</td>";
											echo "<tr>";
										}
								}
							?>
						</table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>