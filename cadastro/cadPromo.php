<!DOCTYPE html>
<?php
    include_once('../classes/autoload.php');
    require_once('../conf/Conexao.php');

    $title = "Promoção | Editar";
    $dia = isset($_GET['dia']) ? $_GET['dia'] : "";
    $imagem = isset($_GET['imagem']) ? $_GET['imagem'] : "";
    $descricao = isset($_GET['descricao']) ? $_GET['descricao'] : "";
    $gerente_id = isset($_GET['gerente_id']) ? $_GET['gerente_id'] : "";
    $pratos_id = isset($_GET['pratos_id']) ? $_GET['pratos_id'] : "";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == 'editar'){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
    if ($id > 0)
        $promo = new Promo("", "", "", "", "", "");
        $dados = $promo->listar(1, $id);
    }
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/cad.css">
    <title><?php echo $title ?></title>
</head>
<body>
    <section class="content-site" style="margin: 30% 10%;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="text-center">Cadastre a Promoção</h1>
                        <br>
                        <div class="lin"></div> 
                        <br>
                        <div class="form">
                            <form method="post" action="../acao/acaoPromo.php" enctype="multipart/form-data">
                                <input readonly type="hidden" name="id" id="id" value="<?php if ($acao == "editar") echo $dados[0]['id']; 
                                else echo 0; ?>">
    
                                <label for="dia">Dia:</label><br>
                                    <input require="true" type="text" name="dia" id="dia" placeholder="Insira o dia da semana" 
                                    value="<?php if ($acao == "editar") echo $dados[0]['dia'];?>">
                                    <br><br>

                                <label for="imagem">Imagem:</label><br>
                                    <label for="imagem" class="file" value="<?php if ($acao == "editar") echo $dados[0]['imagem'];?>">Selecionar Imagem...</label><br>
                                        <input type="file" name="imagem" id="imagem" required 
                                        value="<?php if ($acao == "editar") echo $dados[0]['imagem'];?>">
                                    <br>     
                                    
                                <label for="descricao">Descrição:</label><br>
                                    <input require="true" type="text" name="descricao" id="descricao" placeholder="Insira a descricao" 
                                    value="<?php if ($acao == "editar") echo $dados[0]['descricao'];?>">
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
                                    <br><br>

                                <label for="pratos_id">Prato:</label><br>
                                    <select name="pratos_id" id="pratos_id">
                                        <?php
                                            $pdo = Conexao::getInstance();
                                            $consulta = $pdo->query("SELECT id, nome FROM pratos");
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