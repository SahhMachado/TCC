<?php
    include_once "classes/autoload.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/cad.css">
    <title>Login</title>
</head>
<body>
    <section class="content-site">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center">Login</h1>
                    <br>
                    <div class="lin"></div> 
                    <br>
                    <form method="POST" action="controle/controleLogin.php">
                    <div class="form">
                        <label for="email">Email:</label><br>
                            <input type="email" placeholder="Insira seu email" name="email" id="email" required>
                        <br><br>
                        <label for="senha">Senha:</label><br>
                            <input type="password" placeholder="Insira sua senha" name="senha" id="senha" required>
                    </div>
                    <center>
                        <br><br>
                        <button name="acao" id="acao" type="submit" value="salvar" class="save">Entrar</button>
                        <br><br>
                        <p>Não possui cadastro? <a href="cadastro/cadCliente.php">Cadastre-se</a></p>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>