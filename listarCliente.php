<?php
require_once("funcoes.php");
verificarLogin();
require_once("header.php");
require_once("ligacao.php");

$result = $conn->query("SELECT * FROM cliente order by codCliente desc");


$data = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    //echo($row);
    //var_dump($row);
    array_push($data, $row);
}


?>

<section class="content-header" id="lisUser">
    <h1>
        Lista de Clientes
    </h1>
    <ol class="breadcrumb">
        <form method = "post" name="pesq" action = "pesquisarCliente.php">
            Pesquisar: <input type="text" name="pesquisar">
            <input type="submit" value="Enviar">
        </form>

        <li class="active"><a href="cadastroCliente.php"> Cadastrar novo cliente</a></li>
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
                <th>Nome</th>
                <th>CPF</th>
                <th>Tel</th>
                <th>Endereço</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>CEP</th>
                <th>E-mail</th>

            </tr>
            </thead>
            <tbody>
            <!--loop é um recurso do rain tpl-->
            
                <?php
                    foreach ($data as $key) {
                       
                ?>
                <tr>
                    <td><?php echo $key['codCliente']?></td>
                    <td><?php echo $key['nomeCliente']?></td>
                    <td><?php echo $key['cpfCliente']?></td>
                    <td><?php echo $key['telefoneCliente']?></td>
                    <td><?php echo $key['endereco']?></td>
                    <td><?php echo $key['bairro']?></td>
                    <td><?php echo $key['cidade']?></td>
                    <td><?php echo $key['cep']?></td>
                    <td><?php echo $key['email']?></td>
                    <td style="float: right;">
                    <a href="cadastroCliente.php?id=<?php echo $key['codCliente']?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                    <a href="deletarCliente.php?id=<?php echo $key['codCliente']?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
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

