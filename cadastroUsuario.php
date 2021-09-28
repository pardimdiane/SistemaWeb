<?php
require_once("funcoes.php");
verificarLogin();
require_once("header.php");
require_once("ligacao.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $conn->query("SELECT * FROM usuario where codUsuario = $id");



    $data = array();
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        //echo($row);
        //var_dump($row);
        array_push($data, $row);
    }  


}

?>

 <!-- Post Content -->
  <section class="formulario">
  <?php if (!isset($_GET['id'])) { ?>


    <div class="container">     
        <form method="post" name="cadastrar" action="cadastrar/cadastroUsuar.php" class="form-horizontal">
        <h1>Cadastrar Usuário</h1> 
            <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="cEmail">Endereço de e-mail</label>
                            <input type="email" required="required" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu e-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"> 
                        </div>

                        <div class="form-group">
                            <label for="cEmail">Senha</label>
                            <input type="password" name="senha" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sua senha" required> 
                        </div>

                        <div class="form-group">
                            <label for="cCPF">CPF</label>
                            <input type="text" required="required" name="cpf" class="form-control" id="exampleInputPassword1" placeholder="Seu cpf" required>
                        </div>
                    </div>
              </div>
                <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                
        </form>
    </div>



    

    <?php } else {  ?>
   
            
    
    <div class="container">
        <form method="post" name="editar" action="editarUsuario.php" class="form-horizontal">
            <input type="hidden" name="codUsuario" value="<?php echo $data[0]['codUsuario'];?>">
        <h1>Editar Usuário</h1> 
            <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="cEmail">Endereço de e-mail</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Digite o email" value="<?php echo $data[0]['email']?>">
                           
                        </div>

                        <div class="form-group">
                            <label for="cEmail">Senha</label>
                            <input type="password" name="senha" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sua senha"
                            value="<?php echo $data[0]['senha']?>"> 
                        </div>

                        <div class="form-group">
                            <label for="cCPF">CPF</label>
                            <input type="text" name="cpf" class="form-control" id="exampleInputPassword1" placeholder="Seu cpf"
                            value="<?php echo$data[0]['cpf']?>">
                        </div>
                    </div>
            </div>
                <button type="submit" name="cadastrar" class="btn btn-primary">Salvar</button>
                
        </form>
    </div>
   
    <?php } ?>

  </section>

  

<?php
require_once("footer.php");
?>


  