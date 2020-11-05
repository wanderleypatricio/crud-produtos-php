<?php
    define("DIR", $_SERVER['DOCUMENT_ROOT']);
    require_once DIR.'/cursoPHP/produtos/verifica_sessao.php';
?>

<script>
    function excluirItemSelecionado(codigo){
        var resultado = confirm("Deseja excluir o item?");
        if (resultado) {
            $.ajax({
                method: "GET",
                url: "produto/excluir.php?id="+codigo,
                success: function(response){
                    alert(response);
                }
            })
        }        
    }
</script>
<div class="container">
    <div class="row">
        <div id="box-botao">
            <a href="painel.php?page=cadastrar-produto" class="btn btn-info">Cadastrar</a>
        </div>
        <table width="100%" class="table table-striped table-responsive table-bordered">
            <thead class="thead-dark">
                <th>Código</th>
                <th>Produto</th>
                <th>Preco</th>
                <th>Estoque</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php
                
                    if(!isset($_GET['p'])){$_GET['p'] = null;}
                    $p = $_GET['p'];
                    if($p == null){
                        $p = 1;
                    }
                    
                    $qtde = 5;
                    $inicio = ($p * $qtde) - $qtde;
                    
                    $prod = new Produto();
                    $produtos = new ProdutoDAO();
                    $produtos->setProduto($prod);
                    $dados = $produtos->listar($inicio, $qtde);
                    
                    foreach($dados as $produto){
                ?>
                <tr>
                    <td><?php echo $produto['codigo']?></td>
                    <td><?php echo $produto['produto']?></td>
                    <td><?php echo number_format($produto['preco'], 2 , ",", ".")?></td>
                    <td><?php echo $produto['estoque']?></td>
                    <td>
                        <a href="painel.php?page=cadastrar-produto&id=<?php echo $produto['codigo']?>" class=" btn btn-primary">Alterar</a>
                         /
                         <a href="" id="item" onclick="excluirItemSelecionado(<?php echo $produto['codigo']?>)" class=" btn btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <div>
            <?php
                    $totalregistros = $produtos->totalRegistros();
                    
                    for($i = 1; $i <= ceil($totalregistros/$qtde); $i++){
                ?>
                        <a href="painel.php?page=lista-produtos&p=<?php echo $i ?>" class="btn btn-info"><?php echo $i ?></a>
                <?php
                    }
                ?>
        </div>
        </div>
    
    </div>