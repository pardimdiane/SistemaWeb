<?php
	require_once("ligacao.php");

	$idFornecedor = $_GET['id'];

	$result = $conn->query("DELETE FROM fornecedor where codFornecedor = $idFornecedor");

	header("Location: listarFornecedor.php");
	exit();

?>