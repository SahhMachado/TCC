<!DOCTYPE html>
<?php
    include_once('../classes/autoload.php');
    require_once('../conf/Conexao.php');

    $title = "Pratos";
    $imagem = isset($_GET['imagem']) ? $_GET['imagem'] : "";
    $nome = isset($_GET['nome']) ? $_GET['nome'] : "";
    $ingredientes = isset($_GET['ingredientes']) ? $_GET['ingredientes'] : "";
    $descricao = isset($_GET['descricao']) ? $_GET['descricao'] : "";
    $preco = isset($_GET['preco']) ? $_GET['preco'] : "";
    $categorias_id = isset($_GET['categorias_id']) ? $_GET['categorias_id'] : "";
    $gerente_id = isset($_GET['gerente_id']) ? $_GET['gerente_id'] : "";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == 'editar'){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($id > 0)
        $prato = new Pratos("", "", "", "", "", "", "", "");
        $dados = $prato->listar(1, $id);
    }
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/cad.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title><?php echo $title ?></title>
</head>
<body>
    <section class="content-site" style="margin: 30% 10%;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center">Cadastrar Prato</h1>
                    <br>
                    <div class="lin"></div> 
                    <br>
                    <div class="form">
                        <form method="POST" action="../acao/acaoPrato.php" enctype="multipart/form-data">
                            <input readonly type="hidden" name="id" id="id" value="<?php if ($acao == "editar") echo $dados[0]['id']; 
                            else echo 0; ?>">

                            <label for="imagem">Imagem:</label><br>
                            <label for="imagem" class="file">Selecionar Imagem...</label><br>
                                <input type="file" name="imagem" id="imagem" required 
                                value="<?php if ($acao == "editar") echo $dados[0]['imagem'];?>">
                            <br>

                            <label for="nome">Nome:</label><br>
                                <input require="true" type="text" name="nome" id="nome" placeholder="Insira o nome do prato" 
                                value="<?php if ($acao == "editar") echo $dados[0]['nome'];?>">
                            <br><br>

                            <label for="ingredientes">Ingredientes:</label><br>
                                <input require="true" type="text" name="ingredientes" id="ingredientes" placeholder="insira os ingredientes" 
                                value="<?php if ($acao == "editar") echo $dados[0]['ingredientes'];?>">
                            <br><br>

                            <label for="descricao">Descrição:</label><br>
                                <input require="true" type="text" name="descricao" id="descricao" placeholder="insira a descricao" 
                                value="<?php if ($acao == "editar") echo $dados[0]['descricao'];?>">
                            <br><br>
                            
                            <label for="preco">Preço:</label><br>
                                <input require="true" type="text" name="preco" id="preco" placeholder="insira o preco" 
                                value="<?php if ($acao == "editar") echo $dados[0]['preco'];?>">
                            <br><br>
                            
                            <label for="cateorias_id">Categoria:</label><br>
                                <select name="categorias_id" id="categorias_id">
                                    <?php
                                    $pdo = Conexao::getInstance();
                                    $consulta = $pdo->query("SELECT id, nome FROM categorias");
                                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $linha['id']?>">
                                        <?php echo $linha['nome'];?>
                                    </option>
                                    <?php } ?>
                                </select>
                            <br><br>
                            
                            <label for="gerente_id">Gerente:</label><br>
                                <select name="gerente_id" id="gerente_id">
                                    <?php
                                    $pdo = Conexao::getInstance();
                                    $consulta = $pdo->query("SELECT id, nome FROM gerente");
                                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $linha['id']?>">
                                        <?php echo $linha['nome'];?>
                                    </option>
                                    <?php } ?>
                                </select>
                        </div>
                            <br><br>
                            <center>
                            <button name="acao" value="salvar" id="acao" type="submit" class="save">Salvar</button>
                            </center>
                        </form>
                    </div>
                </div>
    </section>
</body>
</html>