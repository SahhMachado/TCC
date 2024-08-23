<!DOCTYPE html>
<?php 
    require_once "../classes/autoload.php";
    $title = "Categorias | Editar";
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    $imagem = isset($_GET['imagem']) ? $_GET['imagem'] : "";
    $nome = isset($_GET['nome']) ? $_GET['nome'] : "";
    $gerente = isset($_GET['gerente_id']) ? $_GET['gerente_id'] : "";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $cnst = isset($_POST['cnst']) ? $_POST['cnst'] : 1;
?>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet"> -->
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

      .conf{
        background-color: #590202;
        font-family: 'bellerose';
        border: none;
        color: white;
        border-radius: 4px;
        margin-top: 6%;
        width: 20%;
        padding-bottom: 5%;
        display: inline-block;
      }

      .overlay {
          position: fixed;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          background: rgba(0, 0, 0, 0.7);
          transition: opacity 500ms;
          visibility: hidden;
          opacity: 0;
        }
      .overlay:target {
          visibility: visible;
          opacity: 1;
        }

      .popup {
          margin: 70px auto;
          padding: 20px;
          background: #fff;
          border-radius: 5px;
          width: 30%;
          position: relative;
          transition: all 5s ease-in-out;
        }

      .popup h2 {
          margin-top: 5%;
          color: #D97904;
          font-family: 'bellerose';
        }
      .popup .close {
          /* position: absolute; */
          /* top: 5px;
          right: 15px; */
          transition: all 200ms;
          /* font-size: 30px; */
          /* font-weight: bold; */
          text-decoration: none;
          color: white;
        }
      .popup .close:hover {
          color: #590202;
        }

      @media screen and (max-width: 700px){
          .box{
            width: 70%;
          }
          .popup{
            width: 70%;
          }
        }
    </style>
  </head>
  <body>
    <?php
      require_once "menuG.php";
    ?>
    <h1>Categorias</h1>
      <section class="categorias">
        <?php
            $lista = Categoria::listar($cnst, $procurar);
            foreach ($lista as $linha) {
        ?>
        <div>
          <img src="<?php echo $linha['imagem']?>">
            <p class="textoCategoria" style="margin-top: -0.7em;"><?php echo $linha['nome'];?>&ensp;
            <a href='../cadastro/cadCategoria.php?acao=editar&id=<?php echo $linha['id'];?>'>
            <img src='../img/editar.svg' style="width: 1em; display: inline-block;"></a>&ensp;
            <a href="../acao/acaoCategoria.php?acao=excluir&id=<?php echo $linha['id'];?>"><img src='../img/excluir.svg' style='width: 1em; display: inline-block;'></a>
            <!-- <?php echo " <a href=javascript:excluirRegistro('../acao/acaoCategoria.php?acao=excluir&id={$linha['id']}')>
            <img src='../img/excluir.svg' style='width: 1em; display: inline-block;'></a>"; ?> -->
            </p>
        </div>
        <?php } ?>
        <div class="categorias" style="background-color: #590202; max-width: 30%; border-radius: 10px; opacity: 80%;">
          <center>
            <a href="../cadastro/cadCategoria.php">
              <img src="../img/plus.svg" style="width: 3em; height: 3em; opacity: 60%; margin-left: 2.5em; margin-top: 1.5em;">
            </a>
          </center>
          <div class="text-center" style="margin-top: 10%;">
            <p class="textoCategoria">Adicionar</p>
          </div>
        </div>
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
              <a href="../cadastro/cadPromo.php?acao=editar&id=<?php echo $linha['id'];?>">
              <img src="<?php echo $linha['imagem']?>">
                  <h3><?php echo $linha['dia']?></h3>
                  <p><?php echo $linha['descricao']?></p>
              </a>
              <?php } ?>
              <!-- Adicionar -->
              <a href="../cadastro/cadPromo.php">
                <div style="border: 1px solid #D97904; border-radius: 10px; max-width: 50%; padding-bottom: 8%; margin-left: -10em;">
                  <img src="../img/plus.svg" style="width: 3em; height: 3em; opacity: 60%; margin-left: 2.5em; margin-top: 1.5em;">
                </div>
                <br><br>
                  <h3 style="margin-left: -8em;">Adicionar</h3>
              </a>

              <!-- Excluir -->
              <a href="../gerente/ExPromo.php">
                <div style="border: 1px solid #D97904; border-radius: 10px; max-width: 50%; padding-bottom: 8%; float: right; margin-top: 0%; margin-right: 26em; padding-right: 2.5em;">
                  <img src="../img/excluir2.svg" style="width: 3em; height: 3em; opacity: 60%; margin-left: 2.5em; margin-top: 1.5em;">
                </div>
                <br><br>
                  <h3 style="margin-right: 24.6em; float: right; margin-top: 0%;">Excluir</h3>
              </a>
            </div>
          </div>
      </div>
    </center>
    <br><br>
  </body>
</html>