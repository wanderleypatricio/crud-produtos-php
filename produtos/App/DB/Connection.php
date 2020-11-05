<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author Wanderley Patrício
 */
class Connection {
    protected static $con;
    
    public static function getConnection(){
        try{
            //singleton - controla a quantide de objetos criados na memória do 
            //computador permintindo a acriação de um único objeto da mesma classe
            if(!isset(self::$con)){
                self::$con = new PDO('mysql:host=localhost;dbname=bancoteste',
            'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND
            => "SET NAMES utf8"));
            self::$con->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
            self::$con->setAttribute(PDO::ATTR_ORACLE_NULLS,
            PDO::NULL_EMPTY_STRING);
            }
            return self::$con;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
