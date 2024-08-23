<!DOCTYPE html>
<?php 
    require_once "../classes/autoload.php";
    $title = "La'Carte";
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
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/estilos1.css">
    <style>
      body{
        background-color: #FFFAFA;
        overflow-x: hidden;
      }
      main{
        background-size: cover;
        height: 92vh;
      }
      @font-face {
        font-family: "bellerose";
        src: url(../fonts/bellerose/Bellerose.ttf);
      }

      p{
        font-family: "bellerose";
      }
    </style>
  </head>
  <body>
    <?php
      require_once "menu.php";
    ?>
    <h1>Categorias</h1>
      <section class="categorias">
        <?php
            $lista = Categoria::listar($cnst, $procurar);
            foreach ($lista as $linha) {
        ?>
        <div>
          <a href="../categorias/indexPratos.php?acao=ver&id=<?php echo $linha['id'];?>&mesa=<?php echo $mesaid?>">
            <img src="<?php echo $linha['imagem']?>">
          </a>
            <p class="textoCategoria" style="margin-top: -0.7em;"><?php echo $linha['nome'];?></p>
          </a>
        </div>
        <?php } ?>
      </section>

       <!-- Carousel -->
       <center>
      <div class="tituloCarousel">
        <h2>Promoções Diárias</h2>
          <div class="carousel">
            <div class="fotosCarousel">
              <?php
                  $lista = Promo::listar($cnst, $procurar);
                  foreach ($lista as $linha) {
              ?>
              <a href="../categorias/pratos/indexP.php?acao=ver&id=<?php echo $linha['pratos_id']?>">
                  <img src="<?php echo $linha['imagem']?>">
                  <h3><?php echo $linha['dia']?></h3>
                  <p><?php echo $linha['descricao']?></p>
                  </a>
              <?php } ?>
            </div>
          </div>
      </div>
    </center>
    <br><br>
    <script src="../assets/js/index.js"></script>
  </body>
</html>