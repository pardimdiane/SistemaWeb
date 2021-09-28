<?php
require_once("ligacao.php");



$codTipoProduto = $_POST['codTipoProduto'];
$TipoProduto = $_POST['TipoProduto'];


$conn->query("UPDATE TipoProduto set TipoProduto = '$TipoProduto' where codTipoProduto = $codTipoProduto");


header("Location: listarTipoProduto.php");

?>