<?php
	if(isset($_POST["cadTipoPro"])){
			$tipProd = $_POST["TipoProduto"];

		#liga o bd
		$ligax = mysqli_connect("127.0.0.1", "root", "", "casadocriador");

		if(!$ligax){ echo '<p> Falha na ligação.' ; exit;}
		mysqli_select_db($ligax, 'TipoProduto');
		$insere = "INSERT INTO TipoProduto(TipoProduto)
		values ('$tipProd')";
		$result = mysqli_query($ligax, $insere);

		

		header("Location: ../listarTipoProduto.php");


	}



?>