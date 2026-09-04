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

// setar valores no objProduto.
$objProduto1 = new Produto();
$objProduto1->setQuantidade($quantidade);
$objProduto1->setProduto($produto);
$objProduto1->setValor($valor);
$objProduto1->setValorTotal($quantidade, $valor);

$objProdutoDao = new ProdutoDAO($conn);
$objProdutoDao->create($objProduto1);

header("location:index.php");
?>