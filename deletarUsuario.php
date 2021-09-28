<?php
	require_once("ligacao.php");

	$idUsuario = $_GET['id'];

	$result = $conn->query("DELETE FROM usuario where codUsuario = $idUsuario");

	header("Location: listarUsuario.php");
	exit();

?>