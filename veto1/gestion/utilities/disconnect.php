<?php
	session_start();
	session_destroy();
	header('Location: /veto1/index.php');
	exit;
?>