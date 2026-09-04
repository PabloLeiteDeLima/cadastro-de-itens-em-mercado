<?php

// classe
class Produto{
    // Atributos...
    private $id;
    private $quantidade;
    private $produto;
    private $valor;
    private $valorTOtal;

    // Métodos gets...
    public function getId(){
        return $this->id;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function getProduto(){
        return $this->produto;
    }
    public function getValor(){
        return $this->valor;
    }
    public function getValorTotal(){
        return $this->valorTOtal;
    }

    // Métodos sets...
    public function setId($id){
        $this->id = $id;
    }
    public function setQuantidade($qtd){
        $this->quantidade = $qtd;
    }
    public function setProduto($produto){
        $this->produto = $produto;
    }
    public function setValor($valor){
        $this->valor = $valor;
    }
    public function setValorTotal($qtd, $valor){ // SE LIGA: retornando o valor total do produto.
        $this->valorTOtal = $qtd * $valor;
    }

    // MOSTRANDO RETORNO.
    public function retornoOBJ(){
        echo "<br>Quantidade: ". $this->getQuantidade() . "<br>Produto: " . $this->getProduto() . 
                "<br>Valor: " . $this->getValor() . "<br>Valor total: " . $this->getValorTotal();
    }
}