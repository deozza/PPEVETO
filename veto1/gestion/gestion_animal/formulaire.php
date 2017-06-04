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
                    <li class="op-v-item"><a class="op-v-link" href="/veto1/gestion/indexp.php">Retour à l'index</a></li>
 </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div class="container">
<section id="animauxajout">        
        <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="row">
                </br></br>
                <h1>Ajouter un animal</h1>
<form method="POST" action='register.php'>

        <label for ="race">Race : </label>
    <select name="race">
        <option value="">-----------</option>
        <option value=1>Autre</option>
        <option value=2>Chien</option>
        <option value=3>Chat</option>
        <option value=4>Rongeur</option>
        <option value=5>Oiseau</option>
        <option value=6>Reptile</option>
    </select></br>

	<label for="noma">Nom : </label>
	<input type="text" placeholder="Nom de l'animal" name ="noma"></br>

	<label for ="datenaissa">Date de naissance : </label>
	<input type="date" placeholder="aaaa/mm/jj" name="datenaissa"></br>

	<label for="tatouage">Tatouage : </label>
	<input type="text" placeholder="Tatouage de l'animal"name ="tatouage"></br>

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