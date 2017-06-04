<?php
	include'../utilities/secure.php';
	session_start();
	$_SESSION['url'] =$_SERVER['REQUEST_URI'];	
	$_SESSION['numm'] = $_GET['numm'];

	
?>