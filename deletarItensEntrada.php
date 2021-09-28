<?php
	require_once("ligacao.php");

	$idItem = $_GET['id'];

	$result = $conn->query("DELETE FROM itensEntrada where codItensEntrada = $idItem");

	header("Location: listarItensEntrada.php");
	exit();

?>