<?php
require_once("header.php");
require_once("ligacao.php");




$pesquisa = $_POST['pesquisar'];

   if(!$pesquisa){
        echo "Volte atrás e escreva um nome.";}
        

    $ligax = mysqli_connect("127.0.0.1", "root", "", "casadocriador");

    if (!$ligax){echo "<p> Falha na ligação."; exit; } 

    mysqli_select_db($ligax, 'cliente');

    $procura = ("select * from cliente where nomeCliente like '%$pesquisa%'");
     

    $result = mysqli_query($ligax, $procura);

    $nRegistros = mysqli_num_rows($result);
    
    
   


?>



<section class="content-header" id="lisUser">
    <?php
        echo "<p>Nome procurado: $pesquisa</p>";
        echo "N° de registros encontrados: $nRegistros";
    ?>
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
                    for ($i=0; $i<$nRegistros; $i++) {
                        $key = mysqli_fetch_assoc($result);

                       
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
