<?php
require_once("funcoes.php");
verificarLogin();
require_once("header.php");
require_once("ligacao.php");

$result = $conn->query("SELECT * FROM tipoProduto order by codTipoProduto desc");


$data = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    //echo($row);
    //var_dump($row);
    array_push($data, $row);
}


?>


<section class="content-header" id="lisUser">
    <h1>
        Lista tipo de produtos
    </h1>
    <ol class="breadcrumb">
        
        <li class="active"><a href="cadastrarTipoProduto.php">Cadastrar novo tipo produto</a></li>
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
                <th>Tipo do Produto</th>

            </tr>
            </thead>
            <tbody>
            <!--loop é um recurso do rain tpl-->
            
                <?php
                    foreach ($data as $key) {
                       
                ?>
                <tr>
                	<td><?php echo $key['codTipoProduto']?></td>
                    <td><?php echo $key['TipoProduto']?></td>
            
                <td style="float: right;">
                    <a href="cadastrarTipoProduto.php?id=<?php echo $key['codTipoProduto']?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                    <a href="deletarTipoProduto.php?id=<?php echo $key['codTipoProduto']?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
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
