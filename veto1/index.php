<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Allo-Veto : clinique vétérinaire</title>
    <title>TEST</title>

    <!-- Bootstrap Core CSS - CSS perso-->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
        <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript - effet slide onepage -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('/veto1/css/maxresdefault.jpg');"></div>
                <div class="carousel-caption"></div>
        </div>

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
                    <li class="op-v-item"><a class="op-v-link" href="./index.php">Accueil</a></li>
                    <li class="op-v-item"><a class="op-v-link" href="#tarifs">Tarifs</a></li>
                    <li class="op-v-item"><a class="op-v-link" href="#contact">Contact</a> </li>
                    <li class="op-v-item"><a class="op-v-link" href="#connexion">Se connecter</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
        </nav>

    </header>
    <div class="container">
            
        <!-- VISUALISATION DES TARIFS-->

        <section id="tarifs">        
                <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="row">
                        </br></br></br></br></br>
                        <h1>Tarifs</h1>

                        <!-- TARIFS POUR CONSULTATIONS -->

                    <table class="tarifs" border=1>
                        <?php 
                            require_once 'connect_db.php';

                        $sqlC = $db ->query("SELECT nums,prixms,commentaires FROM soins WHERE commentaires like 'Consultation%'");
                        $nbC=$sqlC->rowCount();
                        echo "<tr>
                                    <th><center>Prix unitaire(€)</center></th>
                                    <th><center>Consultations</center></th></tr>";

                        while($dataC = $sqlC->fetch())
                        {
                            echo "<tr>";
                            echo "<td>".$dataC['prixms'] ."</td>";      
                            echo "<td>".$dataC['commentaires'] ."</td>";
                            echo "</tr>";
                        }
                        ?></table>

                        <!-- TARIFS POUR VACCINS -->

                        <table class="tarifs"border=1>
                        <?php

                        $sqlV = $db ->query("SELECT nums, prixms,commentaires FROM soins WHERE commentaires like 'Vaccin%'");
                        $nbV=$sqlV->rowCount();
                        echo "<tr>
                                    <th><center>Prix unitaire(€)</center></th>
                                    <th><center>Vaccins</center></th></tr>";

                        while($dataV = $sqlV->fetch())
                        {
                            echo "<tr>";
                            echo "<td>".$dataV['prixms'] ."</td>";      
                            echo "<td>".$dataV['commentaires'] ."</td>";
                            echo "<tr>";
                        }
                        ?></table>

                        <!-- TARIFS POUR CASTRATIONS/OVARIECTOMIE -->

                        <table class="tarifs"border=1>
                        <?PHP

                        $sqlS = $db ->query("SELECT nums, prixms,commentaires FROM soins WHERE commentaires like 'Castration%' OR commentaires like 'Ovariectomie%'");
                        $nbS=$sqlS->rowCount();
                        echo "<tr>
                                    <th><center>Prix unitaire(€)</center></th>
                                    <th><center>Stérilisation</center></th></tr>";

                        while($dataS = $sqlS->fetch())
                        {
                            echo "<tr>";
                            echo "<td>".$dataS['prixms'] ."</td>";      
                            echo "<td>".$dataS['commentaires'] ."</td>";
                            echo "<tr>";
                        }

                        ?></table><?php

                        $sqlC->CloseCursor();
                        $sqlV->CloseCursor();
                        $sqlS->CloseCursor();
                                        ?>
                        
                    </table>
                </div>
            </div>
       </section>

    
    <!-- FORMULAIRE DE CONTACT-->

        </br></br></br></br>
       <section id="contact">      
            <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="row">
                </br></br>
                    <h1>Contact</h1>
                    <form id="contact" method="POST" action="traitement.php" name="contact" >
                        <fieldset style="width: 680px"><legend>Vos coordonnées</legend>
                            <p><label for="nom">Nom </label>
                            <input required type="text" id="nom" name="nom" tabindex="1" style="width: 650px" /></p>
                            <p><label for="email">Email </label>
                            <input required type="text" id="email" name="email" tabindex="2" style="width: 650px" /></p>
                        </fieldset>
                     
                        <fieldset style="width: 680px"><legend>Votre message</legend>
                            <label for ="objet">Objet du mail</label>
                            <select name="objet">
                                <option value="">-----------</option>
                                <option value='Rendez-vous'>Prendre rendez-vous</option>
                                <option value='Question'>Question</option>
                            </select>
                            <p><label for="message">Message </label>
                            <textarea required id="message" name="message" tabindex="3" rows="8" style="width: 650px"></textarea></p>
                        </fieldset><input type="submit" name="envoi" value="Envoyer!" />
                    </form>
                </div>
            </div>
       </section>


       <!-- FORMULAIRE DE CONNEXION-->

       <section id="connexion">      
               <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="row">
                        </br></br></br></br></br></br></br></br>
                        <h1>Se connecter</h1>
                        <form id="connexion" method="post" action="verif.php">
                            <fieldset style="width: 680px;border-radius: 12px;" >
                                <p><label for="login">Identifiant :</label>
                                <input required type="text" id="login" name="login" tabindex="4"/></p>
                                <p><label for="mdp">Mot de passe :</label>
                                <input required type="password" id="mdp" name="mdp" tabindex="5"/></p>
                            <div style="text-align:center;"><input type="submit" name="Valider" value="Valider" /></div>
                            </fieldset>
                        </form>
                    </div>
                </div>
       </section>
       </br></br></br></br></br></br></br></br>


        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
  <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<div class="container">
    <div class="btn-group">
      <button class="btn btn-default btn-xs disabled">Share:</button>   
        <a class="btn btn-default btn-xs" target="_blank" title="Like On Facebook" href="http://www.facebook.com/plugins/like.php?href=http://alloveto.fr">
            <i class="fa fa-thumbs-o-up fa-lg fb"></i>
        </a>
        <a class="btn btn-default btn-xs google-plus-one" target="_blank" title="+1 On Google" href="https://apis.google.com/_/+1/fastbutton?usegapi=1&amp;size=large&amp;hl=en&amp;url=http://alloveto.fr">
            <i class="fa fa-google-plus fa-2x google"></i>
            <span class="google">1</span>
        </a>
        <a class="btn btn-default btn-xs" target="_blank" title="On Facebook" href="http://www.facebook.com/sharer.php?u=http://alloveto.fr&amp;t=Social%20Buttons%20in%20HTML%20only%20using%20Twitter%20Bootstrap%203%20and%20Font%20Awesome%20Icons">
            <i class="fa fa-facebook fa-lg fb"></i>
        </a>
        <a class="btn btn-default btn-xs" target="_blank" title="On Twitter" href="http://twitter.com/share?url=http://alloveto.fr&amp;text=Social%20Buttons%20in%20HTML%20only%20using%20Twitter%20Bootstrap%203%20and%20Font%20Awesome%20Icons">
            <i class="fa fa-twitter fa-lg tw"></i>
        </a>
        <a class="btn btn-default btn-xs" target="_blank" title="On Google Plus" href="https://plusone.google.com/_/+1/confirm?hl=en&amp;url=http://alloveto.fr">
            <i class="fa fa-google-plus fa-lg google"></i>
        </a>
        <a class="btn btn-default btn-xs" target="_blank" title="On LinkedIn" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://alloveto.fr">
            <i class="fa fa-linkedin fa-lg linkin"></i>
        </a>
        <a class="btn btn-default btn-xs" target="_blank" title="On VK.com" href="http://vk.com/share.php?url=http://alloveto.fr&amp;title=Social%20Buttons%20in%20HTML%20only&amp;description=Social%20Buttons%20in%20HTML%20only%20using%20Twitter%20Bootstrap%203%20and%20Font%20Awesome%20Icons&amp;image=http%3A%2F%2Fostr.io/img/icon_500x500.png">
            <i class="fa fa-vk fa-lg vk"></i>
        </a>
        <a class="btn btn-default btn-xs" target="_blank" title="Pin It" href="http://www.pinterest.com/pin/create/button/?url=http://alloveto.fr&amp;media=http%3A%2F%2Fostr.io/img/share-bar.png&amp;description=Social%20Buttons%20in%20HTML%20only%20using%20Twitter%20Bootstrap%203%20and%20Font%20Awesome%20Icons&amp;">
            <i class="fa fa-pinterest fa-lg pinterest"></i>
        </a>
        <a class="btn btn-default btn-xs" target="_blank" title="Surf!" href="http://surfingbird.ru/share?url=http://alloveto.fr&amp;description=Social%20Buttons%20in%20HTML%20only%20using%20Twitter%20Bootstrap%203%20and%20Font%20Awesome%20Icons&amp;screenshot=http%3A%2F%2Fostr.io/img/share-bar.png&amp;title=Social%20Buttons%20in%20HTML%20only">
            <i class="fa surfingbird fa-lg"></i>
        </a>
    </div>
</div>
                    <p>Copyright &copy;2017 Allo-Veto</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
</body>

</html>
