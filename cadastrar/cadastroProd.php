<?php
    
       
    if (isset($_POST["cadproduto"])){
            $descricao = $_POST["descricao"];
            $codTipoP = $_POST["escolhaTpProduto"];
            $codCateg = $_POST["escolhaCategoria"];
            
       
                
            
        /*Liga ao bd*/
        $ligax = mysqli_connect("127.0.0.1", "root", "", "casadocriador");

        if(!$ligax) {echo '<p> Erro: Falha na ligação.' ; exit;}
        mysqli_select_db($ligax, 'produto');
        $insere = "INSERT INTO produto (descricao, codTipoProduto, codCategoria) 
        values ( '$descricao', '$codTipoP' , '$codCateg'  )";
        $result = mysqli_query($ligax, $insere);

        header("Location: ../listarProduto.php");

    }

?>
