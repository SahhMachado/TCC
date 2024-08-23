<!DOCTYPE html>
<?php 
    require_once "../classes/autoload.php";
    $title = "Mesas com pedidos";
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $cnst = isset($_POST['cnst']) ? $_POST['cnst'] : 1;

    header("refresh: 4");
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
    <script>
        function excluirRegistro(url){
            if (confirm("Excluir Pedido?"))
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

      .ms{
        background-color: #590202;
        margin-bottom: 10%;
        padding: 7%;
        max-width: 98%;
        border-radius: 15px;
      }

      .textoPed{
        display: inline;
        font-family: 'bellerose';
        align-items: left;
        color: white;
        text-decoration: none;
        margin-bottom: 8%;
        font-size: 20px;
      }

      .textoPed:hover{
        color: #D97904;
      }
    </style>
  </head>
  <body>
    <?php
        require_once "menuC.php";
    ?>
    <br>
    <h1>Mesas</h1>
    <br>
      <section class="carrinho">
      <?php
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT mesa.id, pedidos.idPed, pedidos.mesa_id FROM mesa, pedidos 
        WHERE mesa.id = mesa_id GROUP BY mesa.id"); 
          while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <div class="ms">
          <a href="pedidos.php?acao=ver&mesa=<?php echo $linha['id'];?>" 
          class="textoPed" style="display: inline;">Mesa <?php echo $linha['id'];?></a>
      </div>
      <?php } ?>
    </section>
  </body>
</html>