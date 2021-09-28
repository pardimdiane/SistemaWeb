<?php
	require_once("funcoes.php");
	verificarLogin();
	require_once("header.php");
	require_once("ligacao.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $conn->query("SELECT * FROM categoria where codCategoria = $id");



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

			<form method="post" name="cadCategoria" action="cadastrar/cadastroCateg.php">
				<h1>Cadastrar Categoria</h1>
				<div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputCategoria">Categoria</label>
				      <input type="text" required="required" name="Categoria" class="form-control" id="inputCategoria" placeholder="Vacina, ração, utensílio para o campo..." pattern="[a-zA-Z\s]+$" title="O campo nome não pode conter números">
				      
				    </div>
				</div>


			  <button type="submit" name="cadCategoria" class="btn btn-primary">Cadastrar</button>
			</form>

		</div>


	<?php } else {  ?>




		<div class="container">

			<form method="post" name="editCategoria" action="editarCategoria.php">
				 <input type="hidden" name="codCategoria" value="<?php echo $data[0]['codCategoria'];?>">
				<h1>Editar Categoria</h1>
				<div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputCategoria">Categoria</label>
				      <input type="text" name="Categoria" class="form-control" id="inputCategoria" placeholder="Vacina, ração, utensílio para o campo..."
				      value="<?php echo $data[0]['Categoria']?>">
				    </div>
				</div>


			  <button type="submit" name="cadCategoria" class="btn btn-primary">Salvar</button>
			</form>

		</div>

		<?php } ?>

  	</section>




<?php
	require_once("footer.php");
?>