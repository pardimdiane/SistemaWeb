<?php
  require_once("funcoes.php");
  verificarLogin();
	require_once("header.php");
	require_once("ligacao.php");

	$result = $conn->query("SELECT * FROM produto");

	$cEntrada = $_GET['id'];



   if (isset($_GET['cod'])) {
    $cod = $_GET['cod'];

    $results = $conn->query("SELECT * FROM itensEntrada where codItensEntrada = $cod");



    $data = array();
    while ($row = $results->fetch_array(MYSQLI_ASSOC)) {
        //echo($row);
        //var_dump($row);
        array_push($data, $row);
    }  


  }

?>



 <section class="formulario">
  <?php if (!isset($_GET['cod'])) { ?>
	<div class="container">     
	        <form method="post" name="cadastrar" action="cadastrar/cadastroitensEntr.php" class="form-horizontal">
	        <h1>Cadastre os itens da entrada</h1> 
	            
	              Produto<br>

	                 <input value="<?php echo $cEntrada?>" id="idEntrada" name="codEntrada" hidden>

                  	<select name ="escolhaProduto">
                  		<option>Selecione o produto</option>

                          <?php
                              while($row = mysqli_fetch_array($result)){
                                echo '<option value="'.$row['codProduto'].'"> '.$row['descricao'].'</option>';

                                  
                         }
                         ?>
                    </select>



                <div class="form-row">
                  <div class="form-group col-md-3"><br>
                    <label for="inputquantidade">Quantidade</label>
                    <input type="int"  name="quantidade" class="form-control" id="inputquantidade" required>
                  </div>

                 
               
                
                

                  <div class="form-group col-md-3"><br>
                    <label for="inputvalor">Valor unitário</label>
                    <input type="float" name="valorUnitario" class="form-control" id="inputvalor" required>
                  </div>
              </div>
     	
	              
	                <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>

                  <a href="listarItensEntrada.php" class="btn btn-info">Listar</a>
	                
	        </form>
	 </div>









 <?php } else {  ?>

 <?php
    $consulta = ("SELECT itensEntrada.codItensEntrada, itensEntrada.codProduto, produto.descricao, itensEntrada.quantidade, itensentrada.valorUnitario
                  from itensEntrada, produto
                  where itensEntrada.codProduto = produto.codProduto and itensEntrada.codItensEntrada = $cod ;");

    $resultConsulta = $conn->query($consulta);

    $arrayConsult = mysqli_fetch_assoc($resultConsulta);


 ?>



  <div class="container">     
      <form method="post" name="cadastrar" action="editarItensEntrada.php" class="form-horizontal">
        <input type="hidden" name="codItensEntrada" value="<?php echo $data[0]['codItensEntrada'];?>">
        
      <h1>Editar item entrada</h1> 
          
            Produto<br>

               <input value="<?php echo $cEntrada?>" id="idEntrada" name="codEntrada" hidden>

                <select name ="escolhaProduto">
                  <option value="<?php echo $arrayConsult['codProduto']?>"><?php echo $arrayConsult['descricao']?></option>

                      <?php
                          while($row = mysqli_fetch_array($result)){
                            echo '<option value="'.$row['codProduto'].'"> '.$row['descricao'].'</option>';

                              
                     }
                     ?>
                </select>



            <div class="form-row">
              <div class="form-group col-md-3"><br>
                <label for="inputquantidade">Quantidade</label>
                <input type="int"  name="quantidade" class="form-control" id="inputquantidade" 
                       value="<?php echo $data[0]['quantidade']?>">
              </div>

             
           
            
            

              <div class="form-group col-md-3"><br>
                <label for="inputvalor">Valor unitário</label>
                <input type="float" name="valorUnitario" class="form-control" id="inputvalor" 
                        value="<?php echo $data[0]['valorUnitario']?>">
              </div>
          </div>
  
            
              <button type="submit" name="editar" class="btn btn-primary">Salvar</button>
              
      </form>
   </div>




  <?php } ?>

  </section>


   <?php
	require_once("footer.php");
?>