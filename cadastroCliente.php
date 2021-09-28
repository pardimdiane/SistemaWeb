<?php
require_once("funcoes.php");
verificarLogin();
require_once("header.php");
require_once("ligacao.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $conn->query("SELECT * FROM cliente where codCliente = $id");



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

  
  <form method="post" name="cadCliente" action="cadastrar/cadastroCli.php">
    <h1>Cadastrar Cliente</h1>

    <?php if (isset($_SESSION['aviso'])):?>
    <p><b><?php print($_SESSION['aviso']); unset($_SESSION['aviso']);?></b></p>
  <?php endif; ?>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputNomel4">Nome</label>
        <input type="text" name="nomeCliente" class="form-control" id="inputNomel4" placeholder="Nome completo" required="" pattern="[a-zA-Z\s]+$" title="O campo nome não pode conter números">
      </div>
      <div class="form-group col-md-2">
        <label for="inputCPF4">CPF</label>
        <input type="text" name="cpfCliente" class="form-control" id="cpf"  required>
      </div>
      <div class="form-group col-md-2">
        <label for="inputtelefone4">Telefone</label>
        <input type="text" name="telefoneCliente" class="form-control" id="telefone" placeholder="(00)0000-0000">
      </div>
    </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAddress">Endereço</label>
      <input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Rua, n°" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Bairro</label>
      <input type="text" name="bairro" class="form-control" id="inputCity" required>
    </div>
  
    <div class="form-group col-md-6">
        <label for="inputCity">Cidade</label>
        <input type="text" name="cidade" class="form-control" id="inputCity" required>
    </div>
    
    <div class="form-group col-md-6">
          <label for="inputCEP">CEP</label>
          <input type="text" name="cep" class="form-control" id="CEP" required>
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputEmail">E-mail</label>
      <input type="email"  name="email" class="form-control" id="inputEmail" placeholder="Seu e-mail" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
    </div>
  </div>

    <button type="submit" name="cadCliente" class="btn btn-primary">Cadastrar</button>

    <a href="listarEntrada.php" class="btn btn-info">Listar</a>
  </form>


</div>







<?php } else {  ?>

<div class="container">
  <!-- Post Content -->
  <form method="post" name="editCliente" action="editarCliente.php">
      <input type="hidden" name="codCliente" value="<?php echo $data[0]['codCliente'];?>">
    <h1>Editar Cliente</h1>
    <div class="form-row">

      <div class="form-group col-md-6">
        <label for="inputNomel4">Nome</label>
        <input type="text" name="nomeCliente" class="form-control" id="inputNomel4" placeholder="Nome completo"
        value="<?php echo $data[0]['nomeCliente']?>">
      </div>

      <div class="form-group col-md-2">
        <label for="inputCPF4">CPF</label>
        <input type="text" name="cpfCliente" class="form-control" id="cpf" placeholder="Seu CPF"
        value="<?php echo $data[0]['cpfCliente']?>">
      </div>

      <div class="form-group col-md-2">
        <label for="inputtelefone4">Telefone</label>
        <input type="text" name="telefoneCliente" class="form-control" id="telefone"
        value="<?php echo $data[0]['telefoneCliente']?>">
      </div>
    </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAddress">Endereço</label>
      <input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Rua, n°"
      value="<?php echo $data[0]['endereco']?>">
    </div>

    <div class="form-group col-md-6">
        <label for="inputCity">Bairro</label>
        <input type="text" name="bairro" class="form-control" id="inputCity"
        value="<?php echo $data[0]['bairro']?>">
    </div>

    
    <div class="form-group col-md-6">
      <label for="inputCity">Cidade</label>
      <input type="text" name="cidade" class="form-control" id="inputCity"
      value="<?php echo $data[0]['cidade']?>">
    </div>

      <div class="form-group col-md-6">
        <label for="inputCEP">CEP</label>
        <input type="text" name="cep" class="form-control" id="CEP"
        value="<?php echo $data[0]['cep']?>">
      </div>
    

    <div class="form-group col-md-6">
      <label for="inputEmail">E-mail</label>
      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Seu e-mail"
      value="<?php echo $data[0]['email']?>">
    </div>
  </div>

    <button type="submit" name="cadCliente" class="btn btn-primary">Salvar</button>
  </form>


</div>

<?php } ?>

</section>

<?php
require_once("footer.php");
?>

 <script type="text/javascript">
    $("#cpf").mask("000.000.000-00")
    $("#telefone").mask("(00)0000-0000")
    $("#CEP").mask("00.000-000")
  </script>

  