<?php
require_once("funcoes.php");
verificarLogin();
require_once("header.php");
require_once("ligacao.php");

$codPedido = $_GET['id'];

$result = $conn->query("SELECT * FROM pedido, cliente, usuario 
                        WHERE cliente.codCliente = pedido.codCliente and usuario.codUsuario = pedido.codUsuario 
                        AND pedido.codPedido = '$codPedido' order by pedido.dataPedido");


$data = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    //echo($row);
    //var_dump($row);
    array_push($data, $row);
}


if(isset($_POST['pesquisar'])){
	$pesquisa = $_POST['pesquisar'];

	   	if(!$pesquisa){
	        echo "Volte atrás e escreva um nome.";
        }
	        

	    $ligax = mysqli_connect("127.0.0.1", "root", "", "casadocriador");

	    if (!$ligax){echo "<p> Falha na ligação."; exit; } 

	    mysqli_select_db($ligax, 'produto');

	    $procura = ("SELECT * from produto where descricao like '%$pesquisa%'");
	     

	    $result = mysqli_query($ligax, $procura);

	    $nRegistros = mysqli_num_rows($result);

}   



?>

<section class="content-header" id="lisUser">
    <h1>
        SUA COMPRA
    </h1>
    
</section>


<section class="container-fluid" id="listUser2">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                  
                </div>
            </div>
        </div>
    </div>

    <div class="box-body no-padding">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="width: 10px, text-align:center">#</th>
                <th>Data</th>
                <th>Cliente</th>
                <th>Email do vendedor</th>
                <th>Valor total</th>


            </tr>
            </thead>
            <tbody>
            <!--loop é um recurso do rain tpl-->
            
                <?php
                    foreach ($data as $key) {
                       
                ?>
                <tr>
                	<td><?php echo $key['codPedido']?></td>
                    <td><?php echo $key['dataPedido']?></td>
                    <td><?php echo $key['nomeCliente']?></td>
                    <td><?php echo $key['email']?></td>
                    <td><?php echo $key['valorTotal']?></td>
            
                    <td style="float: right;">
                    <a href="#" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                </td>
                </tr>  
                  <?php
                    
                    }

                ?>
            

            </tbody>
        </table>
    </div>
</section>

<section>
	 <ol class="breadcrumb">
         <form method = "post" name="pesq" action = "venda.php">
            Pesquisar: <input type="text" name="pesquisar">
            <input type="hidden" name="id" value="<?php echo $codPedido ?>">
            <input type="submit" value="Enviar">
        </form>

       
    </ol>
<?php  if(isset($_POST['pesquisar'])){ ?>
	<div class="box-body no-padding">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="width: 10px, text-align:center">#</th>
                <th>descriçao</th>
                <th>Valor</th>
            </tr>
            </thead>
            <tbody>
            <!--loop é 
            um recurso do rain tpl-->
            
                <?php
                    for ($i=0; $i<$nRegistros; $i++) {
                        $key = mysqli_fetch_assoc($result);

                       
                ?>

                <tr>
                	<td><?php echo $key['codProduto']?></td>
                    <td><?php echo $key['descricao']?></td>
                    <td><?php echo $key['valor']?></td>
                    <td>
                    	<form method = "post" name="pesq" action = "funcoesCarrinho.php">
                    		<input type="hidden" name="pedido" value="<?php echo $codPedido ?>">
				            <input type="hidden" name="produto" value="<?php echo $key['codProduto'] ?>">
				            <input type="hidden" name="valor" value="<?php echo $key['valor'] ?>">
				            <input type="number" name="quant"></input>
				            <input type="submit" value="Adicionar">
				        </form>
                    </td>
                </tr>  
                  <?php
                    
                    }
                }

                ?>
            

            </tbody>
        </table>
    </div>

</section>

<?php
require_once("footer.php");
?>
