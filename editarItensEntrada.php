<?php
require_once("ligacao.php");



$codIEntrada = $_POST['codItensEntrada'];
$codProduto = $_POST['escolhaProduto'];
$quatidade = $_POST['quantidade'];
$valorunitario = $_POST['valorUnitario'];


$conn->query("UPDATE itensEntrada set codProduto = '$codProduto', quantidade = '$quatidade', valorUnitario = '$valorunitario'   
	        where codItensEntrada = $codIEntrada");


header("Location: listarItensEntrada.php");

?>