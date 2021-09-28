<?php
	session_start();

	if(isset($_POST["cadFornecedor"])){
		$for = $_POST["fornecedor"];
		$cnpj = $_POST["cnpj"];
		$end = $_POST["endereco"];
		$bai = $_POST["bairro"];
		$cid = $_POST["cidade"];
		$cep = $_POST["cep"];
		$ema = $_POST["email"];
		$tele = $_POST["telefone"];

		#Liga o bd
		$ligax = mysqli_connect("127.0.0.1", "root", "", "casadocriador");
		if(!$ligax){echo '<p> Falha na ligação.' , exit;}
		mysqli_select_db($ligax, 'fornecedor');




		//Olha o cnpj se já existe
			$verificaCnpj = "SELECT count(*) from fornecedor where cnpj = '$cnpj';";
			$resultado = mysqli_query($ligax, $verificaCnpj);
			$nRegistros = mysqli_fetch_assoc($resultado);

		if($nRegistros['count(*)']> 0){
				$_SESSION['aviso'] = "<div class='alert alert-danger' role='alert'>
										<strong>Este cnpj já está cadastrado!</strong>
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									  </div>";


					header("Location: ../cadastroFornecedor.php");
			
			}
			else{

				mysqli_select_db($ligax, 'cliente');
				$insere = "INSERT INTO fornecedor(fornecedor, cnpj, endereco, bairro, cidade, cep, email, telefone)
				values('$for', '$cnpj', '$end', '$bai', '$cid', '$cep', '$ema', '$tele')";
				$result = mysqli_query($ligax, $insere);


				$_SESSION['aviso'] = "<div class= 'alert alert-success' role= 'alert'>
										<strong>Cadastrado com sucesso!</strong>
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									  </div>";




									  header("Location: ../listarFornecedor.php");
			}
			
			

		
	}




?>