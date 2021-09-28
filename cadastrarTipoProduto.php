<?php
	require_once("funcoes.php");
	verificarLogin();
	require_once("header.php");
	require_once("ligacao.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $conn->query("SELECT * FROM TipoProduto where codTipoProduto = $id");



    $data = array();
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        //echo($row);
        //var_dump($row);
        array_push($data, $row);
    }  


}


?>


<section class="formulario">
<?php if (!isset($_GET['id'])) { ?>
  <!-- Post Content -->
	<div class="container">
		<form method="post" name="cadTipoPro" action="cadastrar/cadastroTipProd.php">
			<h1>Cadastrar Tipo do Produto</h1>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputTipo">Tipo do produto</label>
			      <input type="text" name="TipoProduto" class="form-control" id="inputTipo" placeholder="Perecível / Não perecível" required="" pattern="[a-zA-Z\s]+$" title="O campo nome não pode conter números">
			      
			    </div>
			</div>


		  <button type="submit" name="cadTipoPro" class="btn btn-primary">Cadastrar</button>
		</form>

	</div>


 <?php } else {  ?>



   <div class="container">
		<form method="post" name="edtTipoPro" action="editarTipoProduto.php">
			<input type="hidden" name="codTipoProduto" value="<?php echo $data[0]['codTipoProduto'];?>">
			<h1>Editar Tipo do Produto</h1>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputTipo">Tipo do produto</label>
			      <input type="text" name="TipoProduto" class="form-control" id="inputTipo" placeholder="Perecível / Não perecível"
			      value="<?php echo $data[0]['TipoProduto']?>">
			    </div>
			</div>


		  <button type="submit" name="cadTipoPro" class="btn btn-primary">Salvar</button>
		</form>

	</div>

 <?php } ?>

</section>


<?php
	require_once("footer.php");
?>