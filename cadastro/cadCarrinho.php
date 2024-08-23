<!DOCTYPE html>
<?php
    include_once('../classes/autoload.php');
    require_once('../conf/Conexao.php');

    $title = "Editar | Carrinho";
    $personalizar = isset($_GET['personalizar']) ? $_GET['personalizar'] : "";
    $ingredientes = isset($_GET['ingredientes']) ? $_GET['ingredientes'] : "";
    $preco = isset($_GET['preco']) ? $_GET['preco'] : "";
    $quant = isset($_GET['quant']) ? $_GET['quant'] : "";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == 'editar'){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($id > 0)
        $Carrinho = new Carrinho("", "", "", "", "", "", "");
        $dados = $Carrinho->listar(1, $id);
    }
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/cad.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <title><?php echo $title ?></title>
    <style>
        textarea{
            border-radius: 4px;
            border: none;
            background-color: white;
            color: #590202;
            padding-left: 5px;
            width: 100%;
        }
    </style>
</head>
<body>
    <section class="content-site" style="margin: 30% 10%;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center">Editar</h1>
                    <br>
                    <div class="lin"></div> 
                    <br>
                    <div class="form">
                        <form method="post" action="../acao/acaoCarrinho.php">

                            <input readonly type="hidden" name="id" id="id" value="<?php if ($acao == "editar") echo $dados[0]['id']; 
                            else echo 0; ?>">
    
                            <label for="personalizar">Personalizar:</label><br>
                                <textarea require="true" type="text" name="personalizar" id="personalizar" placeholder="Nos diga o que gostaria de mudar no seu prato" 
                                value=""><?php if ($acao == "editar") echo $dados[0]['personalizar'];?></textarea>
                                <br><br>

                                <input hidden readonly required="true" name="ingredientes" id="ingredientes" type="date" required="true"
                                value="<?php if ($acao == "editar") echo $dados[0]['ingredientes'];?>">   

                                <input hidden require="true" type="text" name="preco" id="preco" placeholder="Insira o preco" 
                                value="<?php if ($acao == "editar") echo $dados[0]['preco'];?>">
                                
                            <label for="prd1">Quantidade:</label><br>
                                <input require="true" type="number" name="prd1" id="prd1" placeholder="Insira a quantidade desejada" 
                                value="<?php if ($acao == "editar") echo $dados[0]['quant'];?>">  
                            
                                <input hidden require="true" type="number" name="mesa_id" id="mesa_id" placeholder="Insira sua mesa_id" 
                                value="<?php if ($acao == "editar") echo $dados[0]['mesa_id'];?>">

                                <input hidden require="true" type="number" name="pratos_id" id="pratos_id" placeholder="Insira sua pratos_id" 
                                value="<?php if ($acao == "editar") echo $dados[0]['pratos_id'];?>">
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