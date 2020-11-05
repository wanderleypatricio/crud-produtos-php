<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutoDAO
 *
 * @author Wanderley Patrício
 */

class ProdutoDAO implements funcoesDAO {
    protected $produto;
    
    public function setProduto(Produto $obj){
        $this->produto = $obj;
    }


    public function salvar() {
     try{
            $sql = "insert into produtos values(:codigo,:produto,:preco,:estoque)";
            $db = $this->getDB();
            $stm = $db->prepare($sql);
            $stm->bindValue(":codigo", $this->produto->getCodigo());
            $stm->bindValue(":produto", $this->produto->getProduto());
            $stm->bindValue(":preco", $this->produto->getPreco());
            $stm->bindValue(":estoque", $this->produto->getEstoque());
            if($stm->execute()){
                return true;
            }
            
        } catch (Exception $ex) {
            echo "Error: ".$ex->getMessage();
        }   
        return false;
    }
    
    public function alterar() {
        
    }

    public function excluir() {
        
    }

    public function listar() {
        
    }

    private function getDB(){
        return Connection::getConnection();
    }

}
