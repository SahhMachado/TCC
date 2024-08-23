<!DOCTYPE html>
<?php 
    require_once "../classes/autoload.php";
    $title = "Pedidos";
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $cnst = isset($_POST['cnst']) ? $_POST['cnst'] : 1;

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        if ($acao == 'ver'){
            $mesaid = isset($_GET['mesa']) ? $_GET['mesa'] : "";
        if ($mesaid > 0)
            $dados = Mesa::listar(1, $mesaid);
        }
?>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <script>
        function excluirRegistro(url){
            if (confirm("Finalizar?"))
                location.href = url;
        }
    </script>
    <style>
      body{
        background-color: #FFFAFA;
        overflow-x: hidden;
      }

      @font-face {
        font-family: "bellerose";
        src: url(../fonts/bellerose/Bellerose.ttf);
      }

      .app{
        display: inline-block;
        font-family: 'bellerose';
        margin-left: 3%;
      }

      .des{
        font-family: 'bellerose';
        margin-left: 3%;
        color: #D97904;
      }

      .prod{
        background-color: #590202;
        color: white;
        width: 100%;
        border-radius: 10px;
      }
    </style>
  </head>
  <body>
    <?php
        require_once "menuC.php";
    ?>
    <br>
    <h1>Mesa <?php echo $mesaid?></h1>
      <section class="carrinho">
      <?php
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM pedidos, pratos WHERE mesa_id = $mesaid AND pratos.nome = nome_prat"); 
          while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <div class="list"> 
        <div class="prod">
          <p class="app"><?php echo $linha['nome_prat']?></p>
          <p class="app" style="margin-left: 12em;">Quantidade: <?php echo $linha['quant']?></p>
        </div>
      </div>
      <div class="des">
          <p>Ingredientes: <?php echo $linha['ingredientes']?></p>
      </div>
      <button class="del" style="margin-left: 90%;">
        <a href="../acao/acaoPedir.php?acao=excluir&idPed=<?php echo $linha['idPed'];?>&mesa=<?php echo $linha['mesa_id'];?>">
        <img src="../img/ok.svg" style='width: 1em; margin-bottom: 0.2em; display: inline-block;'></a>
      
        <!-- <?php echo "<a href=javascript:excluirRegistro('../acao/acaoPedir.php?acao=excluir&idPed={$linha['idPed']}')>
        <img src='../img/ok.svg' style='width: 1em; margin-bottom: 0.2em; display: inline-block;'></a>"; ?> -->
      </button>
      <?php } ?>
    </section>
  </body>
</html>