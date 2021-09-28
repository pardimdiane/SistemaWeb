<?php
  require_once("funcoes.php");
  verificarLogin();
	require_once("header.php");
	require_once("ligacao.php");

	$results = $conn->query("SELECT * FROM fornecedor");


  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $conn->query("SELECT * FROM entradaProduto where codEntrada = $id");



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
  <form method="post" name="cadEntrada" action="cadastrar/cadastroEntrada.php">
	<h1>Cadastrar entrada de produto</h1><br>
	     
      Fornecedor<br>
      <select name ="escolhaFornecedor">
    		<option>Selecione o fornecedor</option>
               <?php
                while($row = mysqli_fetch_array($results)){
                	echo '<option value="'.$row['codFornecedor'].'"> '.$row['fornecedor'].'</option>';

                    
            }
            ?> 
                
      </select>
      <br><br>

    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="inputEntrada">Data de entrada</label>
        <input type="date" name="dataEntrada" class="form-control" id="inputEntrada" required>
      </div>
    </div>
    <br>
                  
     

  <button type="submit" name="cadEntrada" class="btn btn-primary">Próximo</button>

  <a href="listarEntrada.php" class="btn btn-info">Listar</a>

</form>

</div>







 <?php } else {  ?>

 <?php
    $consulta = ("SELECT entradaproduto.codEntrada, entradaproduto.codFornecedor,fornecedor.codFornecedor, fornecedor.fornecedor, entradaproduto.dataEntrada
                  from entradaproduto, fornecedor
                  where entradaproduto.codFornecedor = fornecedor.codFornecedor and entradaProduto.codEntrada = $id ;");

    $resultConsulta = $conn->query($consulta);

    $arrayConsult = mysqli_fetch_assoc($resultConsulta);

 ?>


<div class="container">
  <form method="post" name="editEntrada" action="editarEntrada.php">
    <input type="hidden" name="codEntrada" value="<?php echo $data[0]['codEntrada'];?>">
  <h1>Editar entrada de produto</h1><br>
       
      Fornecedor<br>
      <select name ="escolhaFornecedor">
        <option value="<?php echo $arrayConsult['codFornecedor']?>"><?php echo $arrayConsult['fornecedor']?></option>
               <?php
                while($row = mysqli_fetch_array($results)){
                  echo '<option value="'.$row['codFornecedor'].'"> '.$row['fornecedor'].'</option>';

                    
            }
            ?> 
                
      </select>
      <br><br>

    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="inputEntrada">Data de entrada</label>
        <input type="date" name="dataEntrada" class="form-control" id="inputEntrada"
        value="<?php echo $data[0]['dataEntrada']?>">
      </div>
    </div>
    <br>
                  
     

  <button type="submit" name="cadEntrada" class="btn btn-primary">Salvar</button>
</form>

</div>


 <?php } ?>

</section>
 

<?php
	require_once("footer.php");
?>


