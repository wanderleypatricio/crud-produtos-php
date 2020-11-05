<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Wanderley Patrício
 */
interface funcoesDAO {
    public function salvar();
    public function alterar();
    public function excluir();
    public function listar();    
}
