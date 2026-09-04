<?php

// requisições necessárias...
include_once("produtoDAO.php");

$id = $_GET['id'];

// criando o objProduto...
$objProduto = new ProdutoDAO($conn);
$objProduto->delete($id);

// redirecionando para página inicial.
header('location:index.php');

?>