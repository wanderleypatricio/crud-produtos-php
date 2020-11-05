<?php
    require_once '../verifica_sessao.php';
    require_once '../autoload.php';        
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Painel adiministrativo - controle de produtos com PHP</title>
        <meta char-set="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" href="../css/admin.css" type="text/css"/>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div id="topo">
                    <div id="titulo">Painel administrativo</div>
                </div>         
                
                <div class="menu-vertical">
                    <ul>
                        <li><a href="painel.php?page=lista-produtos">Produtos</a></li>
                    </ul>
                </div><!--fim da div menu-vertical-->
                <div id="conteudo">
                    <?php
                        //verifica se existe alguma página a ser retornada
                        if(!isset($_GET['page'])){ $_GET['page'] = null;}
                        
                        //se a página existir a variável page pega qual é a página que deve ser aberta
                        $page = $_GET['page'];
                        
                        //verifica qual a página deve ser aberta
                        switch($page){
                            case 'lista-produtos' : require_once 'produto/index.php';
                            break;
                            case 'cadastrar-produto' : require_once 'produto/cadastrar.php';
                            break;
                            case 'alterar-produto' : require_once 'produto/cadastrar.php';
                            break;
                            case 'excluir-produto' : require_once 'produto/exlcuir.php';
                            break;
                            default: echo "<h1>Seja bem vindo ao painel administrativo</h1>";
                        }
                    ?>
                </div><!--fim da div content-->
            </div><!--fim da div row-->
        </div><!--fim da div container-->
    </body>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</html>