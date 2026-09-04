<?php

// requisições necessárias...
include_once("conexao.php");
include_once("produto.php");

class ProdutoDAO{
    // Atributos...
    private $conn;

    // Construtor.
    public function __construct($conn){
        $this->conn = $conn;
    }

    // FUNÇÃO PARA CRIAR DADOS NO BANCO...OK.
    public function create(Produto $objProduto1){

        $stmt = $this->conn->prepare("INSERT INTO produto (quantidade, produto, valor, valorTotal) VALUES (:quantidade, 
                        :produto, :valor, :valorTotal)");
                    
        $stmt->bindValue(":quantidade", $objProduto1->getQuantidade());
        $stmt->bindValue(":produto", $objProduto1->getProduto());
        $stmt->bindValue(":valor", $objProduto1->getValor());
        $stmt->bindValue(":valorTotal", $objProduto1->getValorTotal());

        $stmt->execute();
    }

    public function read(){

        $listaProduto = [];

        $stmt = $this->conn->query("SELECT * FROM produto");

        $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($retorno as $ret){
            $objProduto1 = new Produto();
            $objProduto1->setId($ret['id']);
            $objProduto1->setQuantidade($ret['quantidade']);
            $objProduto1->setProduto($ret['produto']);
            $objProduto1->setValor($ret['valor']);
            $objProduto1->setValorTotal($ret['quantidade'], $ret['valor']);

            $listaProduto[] = $objProduto1;

        }
        return $listaProduto;
    }// fechando o read().

    public function delete($id){

        $stmt = $this->conn->prepare("DELETE FROM `produto` WHERE `produto`.`id` = :id ");

        $stmt->bindValue(":id", $id);

        return $stmt->execute();

    }// fechando delete().

    public function retornaUm($id){
        $lista = [];

        $stmt = $this->conn->query("SELECT * FROM `produto` WHERE `produto`.`id` = $id ");

        $retorno = $stmt->fetchAll();
        
        foreach($retorno as $ret){
            $objProduto1 = new Produto();
            $objProduto1->setId($ret['id']);
            $objProduto1->setQuantidade($ret['quantidade']);
            $objProduto1->setProduto($ret['produto']);
            $objProduto1->setValor($ret['valor']);
            $objProduto1->setValorTotal($ret['quantidade'], $ret['valor']);

            $lista[] = $objProduto1;
        }
        
        return $lista;

    }// fechamento do retornaUm().

    public function atualizar(Produto $objProduto){

        $stmt = $this->conn->prepare("UPDATE `produto` SET `quantidade` = :quantidade, `produto` = :produto, `valor` = :valor,
         `valorTotal` = :valorTotal WHERE `produto`.`id` = :id ");

        $stmt->bindValue(":id", $objProduto->getId());
        $stmt->bindValue(":quantidade", $objProduto->getQuantidade());
        $stmt->bindValue(":produto", $objProduto->getProduto());
        $stmt->bindValue(":valor", $objProduto->getValor());
        $stmt->bindValue(":valorTotal", $objProduto->getValorTotal());

        $stmt->execute();

    }// fechamento da atualizar().
}