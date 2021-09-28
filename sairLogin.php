<?php 
	session_start();
	$_SESSION['login_usuario'] = null;
	header('Location: login.php');
	exit;


?>