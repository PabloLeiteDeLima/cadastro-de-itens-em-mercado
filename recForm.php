<?php 

// requisições necessárias...
include_once("produto.php");
include_once("produtoDAO.php");
include_once("conexao.php");

// dados vindo via formulário...
$quantidade = $_POST['quantidade'];
$produto = $_POST['produto'];
$valor = $_POST['valor'];
$valorTotal = $quantidade * $valor;
// echo "QTD: $quantidade, <br>Produto: $produto, <br>Valor: $valor, <br>Valor Total: $valorTotal";

// setar valores no objProduto.
$objProduto1 = new Produto();
$objProduto1->setQuantidade($quantidade);
$objProduto1->setProduto($produto);
$objProduto1->setValor($valor);
$objProduto1->setValorTotal($quantidade, $valor);
// $objProduto1->retornoOBJ(); // testando para ver se setou os itens no obj.

$objProdutoDao = new ProdutoDAO($conn);
$objProdutoDao->create($objProduto1);

header("location:index.php");
?>