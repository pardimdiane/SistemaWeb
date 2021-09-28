<?php
   
       
    if (isset($_POST["cadastrar"])){
            $codProduto = $_POST["escolhaProduto"];
            $quantidade = $_POST["quantidade"];
            $valorUnit = $_POST["valorUnitario"];
            $codEntrada = $_POST["codEntrada"];
            
    
            
        /*Liga ao bd*/
        $ligax = mysqli_connect("127.0.0.1", "root", "", "casadocriador");

        if(!$ligax) {echo '<p> Erro: Falha na ligação.' ; exit;}
        mysqli_select_db($ligax, 'itensEntrada');
        $insere = "INSERT INTO itensentrada (codProduto, quantidade, valorUnitario, codEntradaProduto) 
        values ( '$codProduto', '$quantidade', '$valorUnit', '$codEntrada')";
        $result = mysqli_query($ligax, $insere);


        header("Location: ../listarItensEntrada.php");

    }

?>