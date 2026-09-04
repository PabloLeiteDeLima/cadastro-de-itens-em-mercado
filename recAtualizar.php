<?php 

// requisições necessárias... 
include_once("produtoDAO.php");
include_once("produto.php");

$id = $_GET['id'];
//echo $id;

// criando o obj para o tratamento DAO.
$produtoDAO = new ProdutoDAO($conn);
$lista = $produtoDAO->retornaUm($id);

foreach($lista as $ret){
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar o produto</title>
</head>
<body>
    <form action="recFormAtualizar.php" method="POST">
        <table border="1" align="center">
            <input type="hidden" name="id_hidden" value="<?php echo $ret->getId() ?>" />
            <tr>
                <th colspan="2">Atualizar o Produto: <?php echo $ret->getProduto() ?></th>
            </tr>
            <tr>
                <td>Código</td>
                <td align="center">
                    <?php echo $ret->getId() ?>
                </td>
            </tr>
            <tr>
                <td>QTD</td>
                <td>
                    <input type="text" name="quantidade" value="<?php echo $ret->getQuantidade() ?> "/>
                </td>
            </tr>
            <tr>
                <td>Produto</td>
                <td>
                    <input type="text" name="produto" value="<?php echo $ret->getProduto() ?>"/>
                </td>
            </tr>
            <tr>
                <td>Valor</td>
                <td>
                    <input type="text" name="valor" value="<?php echo $ret->getValor() ?> "/>
                </td>
            </tr>
            <tr>
                <td>Valor Total</td>
                <td>
                    <input type="text" name="valorTotal" value="<?php echo $ret->getValorTotal() ?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Atualizar" />
                    <button type="button" onclick="window.location.href='index.php';">Home</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
    }
?>