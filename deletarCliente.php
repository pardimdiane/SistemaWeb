<?php
	require_once("ligacao.php");

	$idCliente = $_GET['id'];

	$result = $conn->query("DELETE FROM cliente where codCliente = $idCliente");

	header("Location: listarCliente.php");
	exit();

?>