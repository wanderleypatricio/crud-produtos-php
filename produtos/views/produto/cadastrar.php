<?php
    define("DIR", $_SERVER['DOCUMENT_ROOT']);
    require_once DIR.'/cursoPHP/produtos/verifica_sessao.php';
    
if(!isset($_GET['id'])){$_GET['id'] = null;}

$id = $_GET['id'];

$dados = null;
        
if($id != null){
    $produto = new ProdutoDAO();
    $dados = $produto->listarProdutoID($id);
    
}
?>
<div class="form-cadastro">
    <?php if(!isset($id)){ 
        echo '<h2>Cadastro novo produto</h2>';
    }else{
        echo '<h2>Alterar produto</h2>';
    }
?>
    <script>
    function salvar(){
        var codigo = document.getElementById("codigo").value;
        var produto = document.getElementById("produto").value;
        var preco = document.getElementById("preco").value;
        var estoque = document.getElementById("estoque").value;
        
        if(codigo == null || codigo == ''){
            alert('É necessário informar o código do produto');
        }
        if(produto == null || produto == ''){
            alert('O nome do produto é obrigatório');
        }
        if(preco == null || preco == ''){
            alert('O preço do produto é obrigatório');
        }
        if(estoque == null || estoque == ''){
            alert('A quantidade de produtos em estoque é obrigatória');
        }
        
        $.ajax({
            method: "GET",
            url: "produto/salvar.php?codigo="+codigo+"&produto="+produto+"&preco="+ preco+"&estoque="+estoque+"",
            success: function(response){
                    alert(response);
                    window.location = "painel.php?page=lista-produtos";
                }
        })
    }
    </script>
    
    <form name="form-cadastro" action="" method="post">
        <div class="form-group">
            <label>Código:*</label>
            <input id="codigo" class="form-control" type="text" name="codigo" value="<?php if($id != null){ echo $id; }?>">
        </div>
        <div class="form-group">
            <label>Produto:*</label>
            <input id="produto" class="form-control" type="text" name="produto" value="<?php if($dados != null){ echo $dados[0]['produto'];} ?>">
        </div>
        <div class="form-group">
            <label>Preço:*</label>
            <input id="preco" class="form-control" type="text" name="preco" value="<?php if($dados != null){ echo number_format($dados[0]['preco'], 2 , ",", ".");} ?>">
        </div>
        <div class="form-group">
            <label>Estoque:*</label>
            <input id="estoque" class="form-control" type="text" name="estoque" value="<?php if($dados != null){ echo $dados[0]['estoque'];} ?>">
        </div>
        <div class="form-group">
        <?php if(!isset($id)){ 
        echo '<input class="btn btn-dark" type="button" onclick="salvar()" value="Cadastrar">';
        }else{
            echo '<input class="btn btn-dark" type="button" onclick="salvar()" value="Alterar">';
        }
        ?>
        </div>
    </form>
</div>