<!DOCTYPE html>
<?php 
    require_once "../classes/autoload.php";
    $title = "Mesas | Editar";
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    $nome = isset($_GET['nome']) ? $_GET['nome'] : "";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $cnst = isset($_POST['cnst']) ? $_POST['cnst'] : 1;
?>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/estilos1.css">
    <script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>
    <style>
      body{
        background-color: #FFFAFA;
        overflow-x: hidden;
        font-family: "bellerose";
      }
      main{
        background-size: cover;
        height: 92vh;
      }
      @font-face{
        font-family: "bellerose";
        src: url(../fonts/bellerose/Bellerose.ttf);
      }
    </style>
  </head>
  <body>
    <?php
      require_once "menuG.php";
    ?>
    <h1>Mesas</h1>
      <section class="categorias">
        <?php
            $lista = Mesa::listar($cnst, $procurar);
            foreach ($lista as $linha) {
        ?>
        <div>
            <div class="mm"><p class="textoCategoria"><?php echo $linha['nome'];?></div>
            <a href='../cadastro/cadMesa.php?acao=editar&id=<?php echo $linha['id'];?>'>
            <img src='../img/editar.svg' style="width: 1em; height: 1em; display: inline-block;"></a>
            <?php echo " <a href=javascript:excluirRegistro('../acao/acaoMesa.php?acao=excluir&id={$linha['id']}')>
            <img src='../img/excluir.svg' style='width: 1em; height: 1em; display: inline-block;'></a>"; ?>
            </p>
          </a>
        </div>
        <?php } ?>
        <div class="categorias" style="background-color: #590202; max-width: 30%; border-radius: 10px; opacity: 80%;">
          <center>
            <br>
            <a href="../cadastro/cadMesa.php">
              <img src="../img/plus.svg" style="width: 3em; height: 3em; opacity: 60%; margin-left: 2.5em;">
            </a>
          </center>
          <div class="text-center" style="margin-top: 14%;">
            <p class="textoCategoria">Adicionar</p>
          </div>
        </div>
      </section>
  </body>
</html>