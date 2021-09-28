<?php
require_once("ligacao.php");



$codCliente = $_POST['codCliente'];
$nomeCliente = $_POST['nomeCliente'];
$cpfCliente = $_POST['cpfCliente'];
$telefoneCliente = $_POST['telefoneCliente'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$cep = $_POST['cep'];
$email = $_POST['email'];



$conn->query("UPDATE cliente set nomeCliente = '$nomeCliente', cpfCliente = '$cpfCliente', telefoneCliente = '$telefoneCliente', endereco = '$endereco', 
bairro = '$bairro', cidade = '$cidade', cep = '$cep', email = '$email'   where codCliente = $codCliente");


header("Location: listarCliente.php");

?>