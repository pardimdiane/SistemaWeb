<?php
    require_once("funcoes.php");
    verificarLogin();
	require_once("header.php");
	require_once("ligacao.php");

	$result = $conn->query("SELECT * FROM tipoProduto");

	$resultado = $conn->query("SELECT * FROM categoria");

  

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $res = $conn->query("SELECT * FROM produto where codProduto = $id");



    $data = array();
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
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
         
            <form method="post" name="cadproduto" action="cadastrar/cadastroProd.php">
            	<h1>Cadastrar Produto</h1>
            	<div class="form-row">
            	    <div class="form-group col-md-6">
            	      <label for="inputProduto">Descrição</label>
            	      <input type="text"  name="descricao" class="form-control" id="inputProduto" required="">
                    </div>
            	</div>

            		  Tipo do produto<br>
                	<select name ="escolhaTpProduto">
                		<option></option>
                           <?php
                            while($row = mysqli_fetch_array($result)){
                            	echo '<option value="'.$row['codTipoProduto'].'"> '.$row['TipoProduto'].'</option>';

                                
                        }
                        ?> 
                            
                    </select>
                 
                    <br><br>Categoria<br>
                    <select name ="escolhaCategoria">
                		<option></option>
                           <?php
                            while($row = mysqli_fetch_array($resultado)){
                            	echo '<option value="'.$row['codCategoria'].'"> '.$row['Categoria'].'</option>';

                                
                        }
                        ?> 
                            
                    </select>
                    <br><br>


              <button type="submit" name="cadproduto" class="btn btn-primary">Cadastrar</button>
            </form>

        </div>


    


    <?php } else {  ?>

    <?php
         $consulta = ("SELECT produto.codProduto, produto.descricao, produto.codTipoProduto, 
                        tipoproduto.TipoProduto, produto.codCategoria, categoria.categoria, produto.estoque
                        from produto, tipoProduto, categoria
                        where produto.codTipoProduto = tipoProduto.codTipoProduto 
                        and produto.codCategoria = categoria.codCategoria and produto.codProduto = $id ;");

        $resultConsulta = $conn->query($consulta);

        $arrayConsult = mysqli_fetch_assoc($resultConsulta);

    ?>



        <div class="container">
         
            <form method="post" name="cadproduto" action="editarProduto.php">
                <input type="hidden" name="codProduto" value="<?php echo $data[0]['codProduto'];?>">
                <h1>Editar Produto</h1>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputProduto">Descrição</label>
                      <input type="text" name="descricao" class="form-control" id="inputProduto"
                      value="<?php echo $data[0]['descricao']?>">
                    </div>
                </div>

                      Tipo do produto<br>
                    <select name ="escolhaTpProduto">
                        <option value="<?php echo $arrayConsult['codTipoProduto']?>"><?php echo $arrayConsult['TipoProduto']?></option>
                           <?php
                            while($row = mysqli_fetch_array($result)){
                                echo '<option value="'.$row['codTipoProduto'].'"> '.$row['TipoProduto'].'</option>';

                                
                        }
                        ?> 
                            
                    </select>
                 
                    <br><br>Categoria<br>
                    <select name ="escolhaCategoria">
                        <option value="<?php echo $arrayConsult['codCategoria']?>"><?php echo $arrayConsult['categoria']?></option>
                           <?php
                            while($row = mysqli_fetch_array($resultado)){
                                echo '<option value="'.$row['codCategoria'].'"> '.$row['Categoria'].'</option>';

                                
                        }
                        ?> 
                            
                    </select>
                    <br><br>


              <button type="submit" name="editproduto" class="btn btn-primary">Salvar</button>
            </form>

        </div>

    <?php } ?>

    </section>


    

<?php
	require_once("footer.php");
?>


