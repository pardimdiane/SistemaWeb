<?php
	require_once("ligacao.php");

	$idtipoProduto = $_GET['id'];

	$result = $conn->query("DELETE FROM tipoProduto where codTipoProduto = $idtipoProduto");

	header("Location: listarTipoProduto.php");
	exit();

?>