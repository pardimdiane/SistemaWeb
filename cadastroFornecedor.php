<?php
require_once("funcoes.php");
verificarLogin();
require_once("header.php");
require_once("ligacao.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $conn->query("SELECT * FROM fornecedor where codFornecedor= $id");



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
  <form method="post" name="cadFornecedor" action="cadastrar/cadastroForn.php">
    <h1>Cadastrar Fornecedor</h1>

    <?php if (isset($_SESSION['aviso'])):?>
    <p><b><?php print($_SESSION['aviso']); unset($_SESSION['aviso']);?></b></p>
  <?php endif; ?>
  
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputFornecedor4">Fornecedor</label>
        <input type="text" name="fornecedor" class="form-control" id="inputFornecedor4" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputcnpj4">CNPJ</label>
        <input type="text" name="cnpj" class="form-control" id="cnpj"  required>
      </div>
    </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAddress">Endereço</label>
      <input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Rua, nº" required>
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
        <label for="inputEmail4">E-mail</label>
        <input type="text" name="email" class="form-control" id="inputEmail4" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
      </div>
      <div class="form-group col-md-6">
        <label for="inputtelefone4">Telefone</label>
        <input type="text" name="telefone" class="form-control" id="telefone">
      </div>
  </div>
  
    <button type="submit" name="cadFornecedor" class="btn btn-primary">Cadastrar</button>
  </form>
</div>



<?php } else {  ?>



<div class="container">
  <form method="post" name="editFornecedor" action="editarFornecedor.php">
     <input type="hidden" name="codFornecedor" value="<?php echo $data[0]['codFornecedor'];?>">
    <h1>Editar Fornecedor</h1>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputFornecedor4">Fornecedor</label>
        <input type="text" name="fornecedor" class="form-control" id="inputFornecedor4"
        value="<?php echo $data[0]['fornecedor']?>">
      </div>

      <div class="form-group col-md-6">
        <label for="inputcnpj4">CNPJ</label>
        <input type="text" name="cnpj" class="form-control" id="cnpj" 
        value="<?php echo $data[0]['cnpj']?>">
      </div>

    </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAddress">Endereço</label>
      <input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Rua, nº"
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
      <label for="inputEmail4">E-mail</label>
      <input type="text" name="email" class="form-control" id="inputEmail4"
      value="<?php echo $data[0]['email']?>">
    </div>

    <div class="form-group col-md-6">
      <label for="inputtelefone4">Telefone</label>
      <input type="text" name="telefone" class="form-control" id="telefone"
      value="<?php echo $data[0]['telefone']?>">
    </div>

  </div>
  
    <button type="submit" name="cadFornecedor" class="btn btn-primary">Salvar</button>
  </form>
</div>

<?php } ?>

</section>


<?php
require_once("footer.php");
?>

<script type="text/javascript">
    $("#cnpj").mask("00.000.000/0000-00")
    $("#telefone").mask("(00)0000-0000")
    $("#CEP").mask("00.000-000")
  </script>
