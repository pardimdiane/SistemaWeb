<?php
       
    if (isset($_POST["cadastrar"])){
            $em = $_POST["email"];
            $se =  password_hash($_POST["senha"], PASSWORD_DEFAULT, ['cost'=>12]);
            $cpf = $_POST["cpf"];
                
       
            
            
        /*Liga ao bd*/
        $ligax = mysqli_connect("127.0.0.1", "root", "", "casadocriador");

        if(!$ligax) {echo '<p> Erro: Falha na ligação.' ; exit;}
        mysqli_select_db($ligax, 'usuario');
        $insere = "INSERT INTO usuario (email, senha, cpf) 
        values ( '$em', '$se' , '$cpf'  )";
        $result = mysqli_query($ligax, $insere);

        header("Location: ../listarUsuario.php");

    }

?>

