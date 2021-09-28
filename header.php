<?php 

  require_once("funcoes.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SISAGROPEC - Casa do Criador</title>

  <!-- Bootstrap core CSS -->
  <link href="startbootstrap-clean-blog-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="startbootstrap-clean-blog-gh-pages/css/estilo.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="startbootstrap-clean-blog-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="startbootstrap-clean-blog-gh-pages/css/clean-blog.min.css" rel="stylesheet">
   <!-- Outro Boootstrap 2 -->
    <link rel="stylesheet" href="bootstrap2/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="bootstrap2/dist/css/skins/skin-blue.min.css">

</head>


<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">SISAGROPEC</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          <div class="dropdown nav-link">
            <a class="btn btn-branco dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Vendas
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="cadastrarVendas.php">Iniciar</a>
              <a class="dropdown-item" href="listarVenda.php">Listar</a>
            </div>
          </div>
          </li>
          <li class="nav-item">
          <div class="dropdown nav-link">
            <a class="btn btn-branco dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Clientes
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="cadastroCliente.php">Cadastrar</a>
              <a class="dropdown-item" href="listarCliente.php">Listar</a>
            </div>
          </div>
          </li>

          <li class="nav-item">
          <div class="dropdown nav-link">
            <a class="btn btn-branco dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Produtos
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="cadastroProduto.php">Cadastrar</a>
              <a class="dropdown-item" href="listarProduto.php">Listar</a>
              <a class="dropdown-item" href="listarTipoProduto.php">Tipo produto</a>
              <a class="dropdown-item" href="listarCategoria.php">Categoria</a>
              <a class="dropdown-item" href="cadastrarEntrada.php">Entrada de produtos</a>
            </div>
          </div>
          </li>

          <li class="nav-item">
          <div class="dropdown nav-link">
            <a class="btn btn-branco dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Fornecedores
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="cadastroFornecedor">Cadastrar</a>
              <a class="dropdown-item" href="listarFornecedor.php">Listar</a>
            </div>
          </div>
          </li>
          <li class="nav-item">
          <div class="dropdown nav-link">
            <a class="btn btn-branco dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Usuários
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="cadastroUsuario">Cadastrar</a>
              <a class="dropdown-item" href="listarUsuario.php">Listar</a>
            </div>

            <li class="nav-item" id="sair">
              <a class="nav-link" href="sairLogin.php">Sair</a>
            </li>  

          </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('startbootstrap-clean-blog-gh-pages/img/criador.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
          
          
          </div>
        </div>
      </div>
    </div>
  </header>