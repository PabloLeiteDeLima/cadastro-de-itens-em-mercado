<?php

// requisições necessárias...
include_once("produto.php");
include_once("produtoDAO.php");

// pegar dados do formulário recAtualizar...
$id_hidden = $_POST['id_hidden'];
$quantidade = $_POST['quantidade'];
$produto = $_POST['produto'];
$valor = $_POST['valor'];

// criando obj para setar valores...
$objProduto = new Produto();
$objProduto->setId($id_hidden);
$objProduto->setQuantidade($quantidade);
$objProduto->setProduto($produto);
$objProduto->setValor($valor);
$objProduto->setValorTotal($quantidade, $valor);

// criando obj para setar valores no banco...via DAO.
$objProdutoDAO = new ProdutoDAO($conn);
$objProdutoDAO->atualizar($objProduto);

header('location:index.php');
?>