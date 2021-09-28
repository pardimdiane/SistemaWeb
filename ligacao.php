<?php
//conn variavel para conexão com banco de dados
$conn = new mysqli("localhost", "root", "", "casadocriador");

if ($conn->connect_error) {
    echo "Erro!" . $conn->connect_error;    
}




