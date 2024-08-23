<!DOCTYPE html>
<?php
    include_once('../classes/autoload.php');
    require_once('../conf/Conexao.php');

    $title = "Mesa";
    $nome = isset($_GET['nome']) ? $_GET['nome'] : "";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == 'editar'){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($id > 0)
        $cat = new Mesa("", "");
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
                    <h1 class="text-center">Cadastrar Mesa</h1>
                    <br>
                    <div class="lin"></div> 
                    <br>
                    <form method="POST" action="../acao/acaoMesa.php">
                    <div class="form">
                        <input readonly type="hidden" name="id" id="id" value="<?php if ($acao == "editar") echo $dados[0]['id']; 
                        else echo 0; ?>">

                        <label for="nome">Nome:</label><br>
                            <input type="text" placeholder="Ex.: mesa 1" name="nome" id="nome" required value="<?php if (isset($id)) echo $dados[0]['nome'];?>">
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