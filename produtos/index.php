<script>
    function login(){
        var usuario = document.getElementById("username").value;
        var password = document.getElementById("password").value;
            $.ajax({
                method: "GET",
                url: "login.php?usuario="+usuario+"&senha="+password,
                success: function(response){
                    alert(response);
                    if(response == "true"){
                        window.location = "views/painel.php";                   
                    }else{
                        alert("Usuário e/ou senha inválidos");
                    }
                }
            })
                
    }
</script>
<!DOCTYPE html>
<html>
    <head>
        <title>Criando um sistema de controle de produtos com PHP</title>
        <meta char-set="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" href="css/styles.css" type="text/css"/>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div id="titulo">
                    <h1>Bem vindo ao sistema de Controle de Produtos</h1>
                </div>
                <span id="msg"></span>
                <div id="login">
                    <h3 class="text-center text-white pt-5">Somente usuários cadastrados</h3>
                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">
                                    <form id="login-form" class="form">
                                        <h3 class="text-center text-info">Login</h3>
                                        <div class="form-group">
                                            <label for="username" class="text-info">Username:</label><br>
                                            <input type="text" name="username" id="username" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="text-info">Senha:</label><br>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-info btn-md" onclick="login()">Logar</button>
                                        </div>
                                        <div id="register-link" class="text-right">
                                        <a href="#" class="text-info">Esqueceu a senha?</a>    
                                        <a href="#" class="text-info">Cadastrar</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>