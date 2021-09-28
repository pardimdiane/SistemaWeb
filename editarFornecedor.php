<?php
require_once("ligacao.php");



$codFornecedor = $_POST['codFornecedor'];
$fornecedor = $_POST['fornecedor'];
$cnpj = $_POST['cnpj'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$cep = $_POST['cep'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];




$conn->query("UPDATE fornecedor set fornecedor = '$fornecedor', cnpj = '$cnpj', endereco = '$endereco', 
bairro = '$bairro', cidade = '$cidade', cep = '$cep', email = '$email', telefone = '$telefone'  
 where codFornecedor = $codFornecedor");


header("Location: listarFornecedor.php");

?>