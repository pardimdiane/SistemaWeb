<?php
require_once("funcoes.php");
verificarLogin();
require_once("header.php");
require_once("ligacao.php");

$result = $conn->query("SELECT produto.codProduto, produto.descricao, tipoProduto.TipoProduto, categoria.Categoria, produto.estoque, produto.valor
                        from produto inner join tipoProduto on tipoProduto.codTipoProduto = produto.codTipoProduto 
                        inner join categoria on categoria.codCategoria = produto.codCategoria order by codProduto desc");



$data = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    //echo($row);
    //var_dump($row);
    array_push($data, $row);
}


?>

<section class="content-header" id="lisUser">
    <h1>
        Lista de Produtos
    </h1>
    <ol class="breadcrumb">
        <form method = "post" name="pesq" action = "pesquisarProduto.php">
            Pesquisar: <input type="text" name="pesquisar">
            <input type="submit" value="Enviar">
        </form>

        <li class="active"><a href="cadastroProduto.php">Cadastrar novo produto</a></li>
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
                <th>Descrição</th>
                <th>Tipo produto</th>
                <th>Categoria</th>
                <th>Estoque</th>
                <th>Valor</th>

            </tr>
            </thead>
            <tbody>
            <!--loop é um recurso do rain tpl-->
            
                <?php
                    foreach ($data as $key) {
                       
                ?>
                <tr>
                    <td><?php echo $key['codProduto']?></td>
                    <td><?php echo $key['descricao']?></td>
                    <td><?php echo $key['TipoProduto']?></td>
                    <td><?php echo $key['Categoria']?></td>
                    <td><?php echo $key['estoque']?></td>
                    <td><?php echo $key['valor']?></td>
                    <td style="float: right;">
                    <a href="cadastroProduto.php?id=<?php echo $key['codProduto']?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                    <a href="deletarProduto.php?id=<?php echo $key ['codProduto']?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
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

