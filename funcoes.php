<?php

	function verificarLogin(){
		session_start();
		
		if (!isset($_SESSION['login_usuario'])) {
			header('Location: login.php');
			exit;
		}

	}
	

?>