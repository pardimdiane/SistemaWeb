<?php
require_once("ligacao.php");



$codEntrada = $_POST['codEntrada'];
$codFornecedor = $_POST['escolhaFornecedor'];
$data = $_POST['dataEntrada'];


$conn->query("UPDATE entradaProduto set codFornecedor = '$codFornecedor', dataEntrada = '$data'  where codEntrada = $codEntrada");


header("Location: listarEntrada.php");

?>