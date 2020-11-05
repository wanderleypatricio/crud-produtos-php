<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto
 *
 * @author Wanderley Patrício
 */
class Produto {
   private $codigo; 
   private $produto;
   private $preco;
   private $estoque;
   
   function getCodigo() {
       return $this->codigo;
   }

   function getProduto() {
       return $this->produto;
   }

   function getPreco() {
       return $this->preco;
   }

   function getEstoque() {
       return $this->estoque;
   }

   function setCodigo($codigo) {
       $this->codigo = $codigo;
   }

   function setProduto($produto) {
       $this->produto = $produto;
   }

   function setPreco($preco) {
       $this->preco = $preco;
   }

   function setEstoque($estoque) {
       $this->estoque = $estoque;
   }


   
}
