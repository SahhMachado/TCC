<!DOCTYPE html>
<?php 
    require_once "../classes/autoload.php";
    $title = "Promoções | Excluir";
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $cnst = isset($_POST['cnst']) ? $_POST['cnst'] : 1;
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      body{
        background-color: #FFFAFA;
        overflow-x: hidden;
      }

      @font-face {
        font-family: "bellerose";
        src: url(../fonts/bellerose/Bellerose.ttf);
      }

      .ms{
        background-color: #590202;
        margin-bottom: 10%;
        padding: 7%;
        max-width: 98%;
        border-radius: 15px;
      }

      .texto{
        font-family: 'bellerose';
        align-items: left;
        color: white;
        text-decoration: none;
        margin-bottom: 2%;
        font-size: 20px;
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
          transition: all 200ms;
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
    <br>
    <h1>Promoções</h1>
    <br>
      <section class="carrinho">
      <?php
          $lista = Promo::listar($cnst, $procurar);
          foreach ($lista as $linha) {
      ?>
      <div class="ms">
          <p class="texto">Dia: <?php echo $linha['dia'];?></p>
          <p class="texto">Descrição: <?php echo $linha['descricao'];?></p>
          <br>
          <a href="../acao/acaoPromo.php?acao=excluir&id=<?php echo $linha['id'];?>"><img src="../img/excluir2.svg" style='width: 8%; margin-left: 88%; display: inline;'></a>

          <!-- <a href="#popup1"><img src="../img/excluir2.svg" style='width: 8%; margin-left: 88%; display: inline;'></a>
          <div id="popup1" class="overlay">
            <div class="popup">
                <center>
                  <h2>Deseja excluir o item?</h2>
                  <br>
                  <button class="conf"><a class="close" href='../acao/acaoPromo.php?acao=excluir&id=<?php echo $linha['id'];?>'>Sim</a></button>
                  <button class="conf"><a class="close" href="#">Não</a></button>
                </center>
              </div>
          </div> -->
      </div>
      <?php } ?>
    </section>
  </body>
</html>