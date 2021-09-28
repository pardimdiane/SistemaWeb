<?php
	require_once("ligacao.php");

	$idCategoria = $_GET['id'];

	$result = $conn->query("DELETE FROM categoria where codCategoria = $idCategoria");

	header("Location: listarCategoria.php");
	exit();

?>