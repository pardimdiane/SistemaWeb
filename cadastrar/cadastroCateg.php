<?php
	if(isset($_POST["cadCategoria"])){
			$tipCateg = $_POST["Categoria"];

		#liga o bd
		$ligax = mysqli_connect("127.0.0.1", "root", "", "casadocriador");

		if(!$ligax){ echo '<p> Falha na ligação.' ; exit;}
		mysqli_select_db($ligax, 'categoria');
		$insere = "INSERT INTO categoria(Categoria)
		values ('$tipCateg')";
		$result = mysqli_query($ligax, $insere);

		

		header("Location: ../listarCategoria.php");


	}



?>