<?php

// requisições necessárias...
include_once("produtoDAO.php");
include_once("produto.php");
include_once("conexao.php"); // SE LIGA... TENHO QUE TER A CONEXÃO AQUI ?????

if(isset($_GET['id'])){  // SE LIGA: AQUI TENHO QUE TRATAR O atualizar pegando pelo $id.


}else{
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercadinho</title>
</head>
<body>
    <form action="recForm.php" method="POST">
        <table border="1">
            <tr>
                <th colspan="2">Cadastrar produtos</th>
            </tr>
            <tr>
                <td>Quantidade</td>
                <td>
                    <input type="text" name="quantidade" placeholder="Quantidade do produto" />
                </td>
            </tr>
            <tr>
                <td>Produto</td>
                <td>
                    <input type="text" name="produto" placeholder="Nome do produto" />
                </td>
            </tr>
            <tr>
                <td>Valor</td>
                <td>
                    <input type="text" name="valor" placeholder="valor do produto" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Cadastrar">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<p><p><br>
<table border="1">
    <tr>
        <th colspan="7">Itens Cadastrados</th>
    </tr>
    <tr>
        <td>Código</td>
        <td>QTD</td>
        <td>Produto</td>
        <td>Valor</td>
        <td>Valor Total</td>
        <td>Atualizar</td>
        <td>Deletar</td>
    </tr>

<?php
    $objProdutoDAO = new ProdutoDAO($conn);
    $retorno = $objProdutoDAO->read();
    
    foreach($retorno as $ret){?>
        <tr>
            <td><?php echo $ret->getId() ?></td>
            <td><?php echo $ret->getQuantidade() ?></td>
            <td><?php echo $ret->getProduto() ?> </td>
            <td><?php echo $ret->getValor() ?></td>
            <td><?php echo $ret->getValorTotal()?></td>
            <td>
                <a href="recAtualizar.php?id=<?php echo $ret->getId() ?>">
                    Atualizar
                </a>
            </td>
            <td>
                <a href="recExcluir.php?id=<?php echo $ret->getId() ?>"
                    onclick="return confirm('Deseja excluir o produto: <?php echo $ret->getId() ?>')">
                    Excluir
                </a>
            </td>
            
        </tr>

<?php
    }

?>


</table>

<?php
}
?>