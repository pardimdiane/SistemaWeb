<?php

	require_once("../ligacao.php");    
    session_start();

	//var_dump(expression)
	if(isset($_POST["cadCliente"])){

			$nom = $_POST["nomeCliente"];
			$cpf = $_POST["cpfCliente"];
			$tel = $_POST["telefoneCliente"];
			$end = $_POST["endereco"];
			$ba = $_POST["bairro"];
			$cid = $_POST["cidade"];
			$cep = $_POST["cep"];
			$em = $_POST["email"];


			/*liga o bd
			$ligax = mysqli_connect("127.0.0.1", "root", "", "casadocriador");
			if(!$ligax){ echo '<p> Falha na ligação.' ; exit;}*/



			//Olha o cpf se já existe
			$verificaCpf = "SELECT count(*) from cliente where cpfCliente = '$cpf';";
			$resultado = mysqli_query($conn, $verificaCpf);
			$nRegistros = mysqli_fetch_assoc($resultado);

			
			
			if($nRegistros['count(*)']> 0){
				$_SESSION['aviso'] = "<div class='alert alert-danger' role='alert'>
										<strong>Este cpf já está cadastrado!</strong>
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									  </div>";


					header("Location: ../cadastroCliente.php");
			
			}
			else{

				mysqli_select_db($conn, 'casadocriador');
				$insere = $conn->query("INSERT INTO cliente(nomeCliente, cpfCliente, telefoneCliente, endereco, bairro, cidade, cep, email)
				values ('$nom', '$cpf', '$tel', '$end', '$ba', '$cid', '$cep', '$em')");
				$result = mysqli_query($conn, $insere);
			    


				$_SESSION['aviso'] = "<div class= 'alert alert-success' role= 'alert'>
										<strong>Cadastrado com sucesso!</strong>
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									  </div>";




									  header("Location: ../listarCliente.php");
			}
			
			

			

			

			
	   

		
	}



?>
