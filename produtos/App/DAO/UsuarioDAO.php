<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author Wanderley Patrício
 */
class UsuarioDAO {
    
    public function login($usuario, $senha){
        try{
            $sql = "select * from usuarios where usuario=:usuario and senha=:senha";
            $db = $this->getBD();
            $stm = $db->prepare($sql);
            $stm->bindValue(":usuario", $usuario);
            $stm->bindValue(":senha", $senha);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
            
        } catch (Exception $ex) {
            echo "Error: ".$ex->getMessage();
        }
    }
    
    private function getBD(){
        return connection::getConnection();
    }
}
