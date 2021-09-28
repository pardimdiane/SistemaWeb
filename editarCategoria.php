<?php
require_once("ligacao.php");



$codCategoria = $_POST['codCategoria'];
$Categoria = $_POST['Categoria'];


$conn->query("UPDATE categoria set Categoria = '$Categoria' where codCategoria = $codCategoria");


header("Location: listarCategoria.php");

?>