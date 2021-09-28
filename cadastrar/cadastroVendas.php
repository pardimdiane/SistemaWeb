<?php
   
       
    if (isset($_POST["cadastroVendas"])){
            $codCliente = $_POST["escolhaCliente"];
            $codUsuario = $_POST["codUsuario"];
         
    
            
        /*Liga ao bd*/
        $ligax = mysqli_connect("127.0.0.1", "root", "", "casadocriador");

        if(!$ligax) {echo '<p> Erro: Falha na ligação.' ; exit;}
        mysqli_select_db($ligax, 'pedido');
        $insere = "INSERT INTO pedido (codCliente, codUsuario, dataPedido) 
        values ( '$codCliente', '$codUsuario', current_date())";
        $result = mysqli_query($ligax, $insere);

        header("Location: ../listarVenda.php");

    }

?>