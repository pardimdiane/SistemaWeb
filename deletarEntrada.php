<?php
	require_once("ligacao.php");

	$idEntrada = $_GET['id'];

	$result = $conn->query("DELETE FROM entradaProduto where codEntrada = $idEntrada");

	header("Location: listarEntrada.php");
	exit();

?>