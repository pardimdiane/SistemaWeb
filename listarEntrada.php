<?php
require_once("funcoes.php");
verificarLogin();
require_once("header.php");
require_once("ligacao.php");

$result = $conn->query ("SELECT entradaProduto.codEntrada, fornecedor.fornecedor, entradaProduto.precoCompra, entradaProduto.dataEntrada
from entradaProduto inner join fornecedor on fornecedor.codFornecedor = entradaProduto.codFornecedor order by codEntrada desc");



$data = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    //echo($row);
    //var_dump($row);
    array_push($data, $row);
}


?>

<section class="content-header" id="lisUser">
    <h1>
        Lista de entradas
    </h1>
    <ol class="breadcrumb">
        <form method = "post" name="pesq" action = "pesquisarEntrada.php">
            Pesquisar: <input type="text" name="pesquisar">
            <input type="submit" value="Enviar">
        </form>

        <li class="active"><a href="cadastrarEntrada.php">Cadastrar nova entrada</a></li>
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
                <th>Fornecedor</th>
                <th>Preço de compra</th>
                <th>Data de entrada</th>
                

            </tr>
            </thead>
            <tbody>
            <!--loop é um recurso do rain tpl-->
            
                <?php
                    foreach ($data as $key) {
                       
                ?>
                <tr>
                    <td><?php echo $key['codEntrada']?></td>
                    <td><?php echo $key['fornecedor']?></td>
                    <td><?php echo $key['precoCompra']?></td>
                    <td><?php echo $key['dataEntrada']?></td>
                    <td style="float: right;">
                    <a href="cadastrarItensEntrada.php?id=<?php echo $key['codEntrada']?>" class="btn btn-info"> Itens </a>
                    <a href="cadastrarEntrada.php?id=<?php echo $key['codEntrada']?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                    <a href="deletarEntrada.php?id=<?php echo $key ['codEntrada']?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
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

