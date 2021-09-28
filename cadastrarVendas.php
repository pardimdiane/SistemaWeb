<?php
require_once("funcoes.php");
verificarLogin();
require_once("header.php");
require_once("ligacao.php");

$var = $_SESSION['login_usuario'];
$codUsuario = $var['codUsuario'];

$resultCliente = $conn->query ("SELECT * FROM cliente");

?>


<div class="container">
  
  <form method="post" name="cadCliente" action="cadastrar/cadastroVendas.php">
    <h1>Vendas</h1>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputNomel4">Cliente</label>
        	<select name ="escolhaCliente" required>
          		<option>Selecione o Cliente</option>
                    <?php
                      while($row = mysqli_fetch_array($resultCliente)){
                      	echo '<option value="'.$row['codCliente'].'"> '.$row['nomeCliente']. ' -- ' . $row['cpfCliente'] .'</option>';
     
                      }
                    ?> 
                            
          </select>
      </div>
        <input type="hidden" name="codUsuario" class="form-control" value="<?php echo $codUsuario ?>">
    </div>
    <button type="submit" name="cadastroVendas" class="btn btn-primary">Iniciar</button>
  </form>

</div>




<?php
  require_once("footer.php");
?>