<?php

// requisições necessárias...
include_once("produtoDAO.php");

$id = $_GET['id'];
//echo "ID pego pelo get: " . $id;

// criando o objProduto...
$objProduto = new ProdutoDAO($conn);
$objProduto->delete($id);

header('location:index.php');

?>