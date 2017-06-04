<?php
    session_start();
	require_once './utilities/secure.php';
	require_once './utilities/connect_db.php';

            //INDEX DE L'ADMIN

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


				<?PHP include("./utilities/menu.php");?>
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
                    <p>Copyright &copy; Allo-Veto, </p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
</body>

</html>