<!DOCTYPE html>
<?php 
    require_once "../classes/autoload.php";
    $title = "Categorias";
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    $imagem = isset($_FILES['imagem']) ? $_FILES['imagem'] : "";
    $nome = isset($_GET['nome']) ? $_GET['nome'] : "";
    $gerente = isset($_GET['gerente_id']) ? $_GET['gerente_id'] : "";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $cnst = isset($_POST['cnst']) ? $_POST['cnst'] : 1;
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title><?php echo $title ?></title>
    <script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>
</head>
<body>
    <header>
    </header>
    <br>
    <div class="container">
        <form method="post">
        <h3>Procurar Categoria:</h3>
        <input type="text" name="procurar" id="procurar" class="bs" size="25" placeholder="pesquisar"
        value="<?php echo $procurar;?>"><br><br>
    <center><button name="acao" id="acao" type="submit">Procurar</button></center>
    <br><br>
    <fieldset>
    <p> Ordernar e pesquisar por:</p><br>
        <form method="post" action="">
            <input type="radio" name="cnst" value="1" <?php if ($cnst == "1") echo "checked" ?>> ID<br>
            <input type="radio" name="cnst" value="2" <?php if ($cnst == "2") echo "checked" ?>> Nome<br>
    <br><br>
    </form>
<table class="tab">
            <tr>
                <td><b>ID</b></td>
                <td><b>Imagem</b></td>
                <td><b>Nome</b></td>
                <td><b>ID Gerente</b></td>
                <td><b>Editar</b></td>
                <td><b>Excluir</b></td>
    </tr> 
    <tr>
    <?php
        $lista = Categoria::listar($cnst, $procurar);
        foreach ($lista as $linha) {
    ?>

            <td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['imagem'];?></td>
            <td><?php echo $linha['nome'];?></td> 
            <td><?php echo $linha['gerente_id'];?></td> 
            
            <td><a href='../cadastro/cadCategoria.php?acao=editar&id=<?php echo $linha['id'];?>'><img src='../img/edit.svg'></a></td>
            <td><?php echo " <a href=javascript:excluirRegistro('../acao/acaoCategoria.php?acao=excluir&id={$linha['id']}')>
            <img src='../img/excluir.svg'></a><br>"; ?></td>
        </tr>   
        <?php } ?>    
    </table>
    </fieldset>
    </form>
    </div>
    <br>
</body>
</html>