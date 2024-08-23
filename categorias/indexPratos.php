<!DOCTYPE html>
<?php 
    require_once "../classes/autoload.php";
    $title = "Pratos";
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $cnst = isset($_POST['cnst']) ? $_POST['cnst'] : 1;

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == 'ver'){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($id > 0)
        $prat = new Pratos("", "", "", "", "", "", "", "");
        $dados = $prat->listar(1, $id);
    }
?>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/pratos.css">
    <style>
      body{
        background-color: #FFFAFA;
        overflow-x: hidden;
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
      require_once "menuP.php";
      $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM categorias WHERE id = $id"); 
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <h1><?php echo $linha['nome']; } ?></h1>
      <section class="categorias">
      <?php
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM pratos WHERE categorias_id = $id"); 
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {  
      ?>
        <div>
        <a href="pratos/indexP.php?acao=ver&id=<?php echo $linha['id'];?>&mesa=<?php echo $mesaid?>">
          <img src="<?php echo $linha['imagem']?>">
        </a>
            <p style="display: inline-block;"><?php echo $linha['nome'];?></p>
            <p style="display: inline-block; margin-left: 25%;"><?php echo "R$ ".$linha['preco'];?></p>
          </a>
        </div>
        <?php } ?>
      </section>
  </body>
</html>


