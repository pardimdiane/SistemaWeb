<?php
require_once("funcoes.php");
verificarLogin();
require_once("header.php");
require_once("ligacao.php");

$result = $conn->query("SELECT * FROM usuario order by codUsuario desc");



$data = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    //echo($row);
    //var_dump($row);
    array_push($data, $row);
}


?>

<section class="content-header" id="lisUser">
    <h1>
        Lista de Usuários
    </h1>
    <ol class="breadcrumb">
        <form method = "post" action = "pesquisarUsuario.php">
            Pesquisar: <input type="text" name="pesquisar" placeholder="Pesquise por nome">
            <input type="submit" value="Enviar">
        </form>

        <li class="active"><a href="cadastroUsuario.php">Cadastrar novo usuário</a></li>
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
                <th>E-mail</th>
                <th>CPF</th>

            </tr>
            </thead>
            <tbody>
            <!--loop é um recurso do rain tpl-->
            
                <?php
                    foreach ($data as $key) {
                       
                ?>
                <tr>
                    <td><?php echo $key['codUsuario']?></td>
                    <td><?php echo $key['email']?></td>
                    <td><?php echo $key['cpf']?></td>
                    <td style="float: right;">
                    <a href="cadastroUsuario.php?id=<?php echo $key['codUsuario']?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                    <a href="deletarUsuario.php?id=<?php echo $key ['codUsuario']?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
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

