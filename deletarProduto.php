<?php
	require_once("ligacao.php");

	$idProduto = $_GET['id'];

	$result = $conn->query("DELETE FROM produto where codProduto = $idProduto");

	header("Location: listarProduto.php");
	exit();

?>