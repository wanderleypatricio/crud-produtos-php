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
            $sql = "insert into produtos values(:codigo,:produto,:preco,:estoque)"; //instrução sql que será executada
            $db = $this->getDB(); //abre a conexão com o banco de dados
            $stm = $db->prepare($sql); //prepara a ação a ser executada no banco de dados
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
        try{
            $sql = "update produtos set produto= :produto,preco= :preco,estoque= :estoque where codigo = :codigo"; //instrução sql que será executada
            $db = $this->getDB(); //abre a conexão com o banco de dados
            $stm = $db->prepare($sql); //prepara a ação a ser executada no banco de dados
            $stm->bindValue(":produto", $this->produto->getProduto());
            $stm->bindValue(":preco", $this->produto->getPreco());
            $stm->bindValue(":estoque", $this->produto->getEstoque());
            $stm->bindValue(":codigo", $this->produto->getCodigo());
            if($stm->execute()){
                return true;
            }
            
        } catch (Exception $ex) {
            echo "Error: ".$ex->getMessage();
        }   
        return false;
    }

    public function excluir($id) {
        try{
            $sql = "delete from produtos where codigo=:codigo";
            $db = $this->getDB();
            $stm = $db->prepare($sql);
            $stm->BindValue(":codigo", $id);
            if($stm->execute()){
                return true;
            }
        } catch (Exception $ex) {
            echo "Error: ". $ex->getMessage();
        }
        return false;
    }

    public function listar($inicio, $qtde) {
        try{
            $sql = "select * from produtos order by produto limit $inicio, $qtde";
            $db = $this->getDB();
            $stm = $db->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            echo "Error: ". $ex->getMessage();
        }
    }
    
    public function totalRegistros() {
        try{
            $sql = "select * from produtos";
            $db = $this->getDB();
            $stm = $db->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_ASSOC);
            return $stm->rowCount();
        } catch (Exception $ex) {
            echo "Error: ". $ex->getMessage();
        }
    }

    private function getDB(){
        return Connection::getConnection();
    }
}
