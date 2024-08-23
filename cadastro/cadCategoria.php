<!DOCTYPE html>
<?php
    include_once('../classes/autoload.php');
    require_once('../conf/Conexao.php');

    $title = "Categorias";
    $imagem = isset($_GET['imagem']) ? $_GET['imagem'] : "";
    $nome = isset($_GET['nome']) ? $_GET['nome'] : "";
    $gerente_id = isset($_GET['gerente_id']) ? $_GET['gerente_id'] : "";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == 'editar'){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($id > 0)
        $cat = new Categoria("", "", "", "");
        $dados = $cat->listar(1, $id);
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/cad.css">
    <title><?php echo $title ?></title>
</head>
<body>
    <section class="content-site">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center">Cadastrar Categoria</h1>
                    <br>
                    <div class="lin"></div> 
                    <br>
                    <form method="POST" action="../acao/acaoCategoria.php" enctype="multipart/form-data">
                    <div class="form">
                        <input readonly type="hidden" name="id" id="id" value="<?php if ($acao == "editar") echo $dados[0]['id']; 
                        else echo 0; ?>">

                        <label for="imagem">Imagem:</label><br>
                        <label for="imagem" class="file">Selecionar Imagem...</label><br>
                            <input type="file" name="imagem" id="imagem" required 
                            value="<?php if ($acao == "editar") echo $dados[0]['imagem'];?>">
                        <br>

                        <label for="nome">Nome:</label><br>
                            <input type="text" placeholder="Insira o nome da categoria" name="nome" id="nome" required value="<?php if (isset($id)) echo $dados[0]['nome'];?>">
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
                        <button name="acao" id="acao" type="submit" value="salvar" class="save">Salvar</button>
                        </center>
                    </form>
                </div>
            </div>
    </section>
</body>
</html>