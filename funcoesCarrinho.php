<?php // Adição de Produto ao Carrinho
        if(isset($_POST['adicionar'])){
        	$codPedido = $_POST['pedido'];
            $codProduto = $_POST['produto'];
            $quant = $_POST['quant'];
            $valor = $_POST['valor'];

            $result = $conn->prepare("INSERT INTO itemPedido (quant, codPedido, codProduto, valor) VALUE (?, ?, ?) ");
            $result->execute(array($quant, $codPedido, $codProduto, $valor));

            header('location:venda.php?id='.$codPedido);
        }
    // Fim da Adição de Produto ao Carrinho

    // Remoção de Produto do Carrinho
    if(isset($_POST['remover'])){

        $idCompraProduto = $_POST['compraProduto'];
        $idProduto = $_POST['produto'];
        $quant = $_POST['quant'];
        $valor = $_POST['valor'];

        $result = $conn->prepare("DELETE FROM compraproduto WHERE compraProduto.idCompraProduto = '$idCompraProduto' ");
        $result->execute();

        header('location:carrinho.php?id='.$idCompra);
    }
    // Fim da Remoção de Produto do Carrinho