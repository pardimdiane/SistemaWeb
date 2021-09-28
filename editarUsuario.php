<?php
require_once("ligacao.php");



$codUsuario = $_POST['codUsuario'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];


$conn->query("UPDATE usuario set email = '$email', cpf = '$cpf' where codUsuario = $codUsuario");


header("Location: listarUsuario.php");

?>