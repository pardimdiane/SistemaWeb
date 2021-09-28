<?php
require_once("funcoes.php");
verificarLogin();
require_once("header.php");
require_once("ligacao.php");

$result = $conn->query("SELECT * FROM categoria order by codCategoria desc");


$data = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    //echo($row);
    //var_dump($row);
    array_push($data, $row);
}


?>


<section class="content-header" id="lisUser">
    <h1>
        Lista tipo de categoria
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
                <th>Categoria</th>

            </tr>
            </thead>
            <tbody>
            <!--loop é um recurso do rain tpl-->
            
                <?php
                    foreach ($data as $key) {
                       
                ?>
                <tr>
                	<td><?php echo $key['codCategoria']?></td>
                    <td><?php echo $key['Categoria']?></td>
            
                    <td style="float: right;">
                    <a href="cadastrarCategoria.php?id=<?php echo $key['codCategoria']?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                    <a href="deletarCategoria.php?id=<?php echo $key['codCategoria']?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
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
