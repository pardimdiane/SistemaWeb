<?php
require_once("ligacao.php");



$codProduto = $_POST['codProduto'];
$descricao = $_POST['descricao'];
$tpoProduto = $_POST['escolhaTpProduto'];
$tpocategotia = $_POST['escolhaCategoria'];


$conn->query("UPDATE produto set descricao = '$descricao', codTipoProduto = '$tpoProduto', 
	         codCategoria = '$tpocategotia'   where codProduto = $codProduto");


header("Location: listarProduto.php");

?>