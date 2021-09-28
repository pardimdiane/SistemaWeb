<?php
	require_once("ligacao.php");

	$email = $_POST['email'];
	$senha = $_POST['senha'];


	if (empty($email)) {
		//por favor preencha o campo da senha
	}else{

		$result = $conn->query("SELECT * FROM usuario where email = '$email'");
		$result = $result->fetch_array(MYSQLI_ASSOC);

	
		if (empty($result)) {
			//não trouxe nada do banco
		}else{


			if(password_verify($senha, $result['senha']) == true){
				session_start();

				$_SESSION['login_usuario'] = $result;


				header('Location: index.php');
				exit;
			}else{
				// guarda erro em uma sessão
				header('Location: login.php');
				exit;
			}

		}
	}
	
	
?>