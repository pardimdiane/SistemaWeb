<?php
require_once("funcoes.php");
verificarLogin();
require_once("header.php");
require_once("ligacao.php");

$result = $conn->query("SELECT * FROM fornecedor order by codFornecedor desc");


$data = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    //echo($row);
    //var_dump($row);
    array_push($data, $row);
}


?>

<section class="content-header" id="lisUser">
    <h1>
        Lista de Fornecedores
    </h1>
    <ol class="breadcrumb">
        <form method = "post" name="pesq" action = "pesquisarFornecedor.php">
            Pesquisar: <input type="text" name="pesquisar">
            <input type="submit" value="Enviar">
        </form>

        <li class="active"><a href="cadastroFornecedor.php">Cadastrar novo fornecedor</a></li>
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
                <th>CNPJ</th>
                <th>Endereço</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>CEP</th>
                <th>E-mail</th>
                <th>Telefone</th>

            </tr>
            </thead>
            <tbody>
            <!--loop é um recurso do rain tpl-->
            
                <?php
                    foreach ($data as $key) {
                       
                ?>
                <tr>
                    <td><?php echo $key['codFornecedor']?></td>
                    <td><?php echo $key['fornecedor']?></td>
                    <td><?php echo $key['cnpj']?></td>
                    <td><?php echo $key['endereco']?></td>
                    <td><?php echo $key['bairro']?></td>
                    <td><?php echo $key['cidade']?></td>
                    <td><?php echo $key['cep']?></td>
                    <td><?php echo $key['email']?></td>
                    <td><?php echo $key['telefone']?></td>
                    <td style="float: right;">
                    <a href="cadastroFornecedor.php?id=<?php echo $key['codFornecedor']?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                    <a href="deletarFornecedor.php?id=<?php echo $key ['codFornecedor']?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
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

