<?php
       
    if (isset($_POST["cadEntrada"])){
            $codfornecedor = $_POST["escolhaFornecedor"];
            $dtEntrada = $_POST["dataEntrada"];
            
    
            
        /*Liga ao bd*/
        $ligax = mysqli_connect("127.0.0.1", "root", "", "casadocriador");

        if(!$ligax) {echo '<p> Erro: Falha na ligação.' ; exit;}
        mysqli_select_db($ligax, 'entradaProduto');
        $insere = "INSERT INTO entradaProduto (codFornecedor, dataEntrada) 
        values ( '$codfornecedor', '$dtEntrada'  )";
        $result = mysqli_query($ligax, $insere);



        header("Location: ../listarEntrada.php");

    }

?>
