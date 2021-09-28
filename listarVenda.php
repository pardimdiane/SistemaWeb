<?php
require_once("funcoes.php");
verificarLogin();
require_once("header.php");
require_once("ligacao.php");

$result = $conn->query("SELECT * FROM pedido, cliente, usuario WHERE cliente.codCliente = pedido.codCliente 
                        and usuario.codUsuario = pedido.codUsuario order by codPedido desc");


$data = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    //echo($row);
    //var_dump($row);
    array_push($data, $row);
}


?>


<section class="content-header" id="lisUser">
    <h1>
        Lista de vendas
    </h1>
    <ol class="breadcrumb">
         <form method = "post" name="pesq" action = "pesquisarCategoria.php">
            Pesquisar: <input type="text" name="pesquisar">
            <input type="submit" value="Enviar">
        </form>

        <li class="active"><a href="cadastrarCategoria.php">Cadastrar nova categoria</a></li>
    </ol>
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
                    <td><?php echo $key['valorTotal']?></td>
            
                    <td style="float: right;">
                    <a href="venda.php?id=<?php echo $key['codPedido']?>" class="btn btn-primary btn-xs">Visualizar</a>
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



<?php
require_once("footer.php");
?>
