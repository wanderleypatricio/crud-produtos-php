<?php
    require_once './autoload.php';
    session_start();
    
    $usuario = $_GET['usuario'];
    $senha = $_GET['senha'];
    
    $user = new UsuarioDAO();
    $dados = $user->login($usuario, $senha);
    if($dados){
        $_SESSION['id'] = $dados['codigo'];
        $_SESSION['nome'] = $dados['nome'];
        echo "true";
    }else {
        echo "false";
    }
?>