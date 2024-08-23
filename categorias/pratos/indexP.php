<!DOCTYPE html>
<?php 
    include_once "../../conf/default.inc.php";
    require_once "../../conf/Conexao.php";
    require_once "../../classes/autoload2.php";
    
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratos</title>
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <link rel="stylesheet" href="p1.css">
    <style>
      body{
        background-color: #FFFAFA;
        overflow-x: hidden;
      }
    
      main{
        background-size: cover;
        height: 92vh;
      }

      img{
        border-radius: 6px;
      }
      
      .mesa{
        border: 0.1em solid #FF9045;
        border-radius: 0.2em;
        padding: 0.5em;
      }

      .av{
        font-family: system-ui, -apple-system, Helvetica, Arial, sans-serif;
        font-size: 1em;
        text-align: center;
        color: #FFFAFA;
      }

      @font-face {
        font-family: "bellerose";
        src: url(../../fonts/bellerose/Bellerose.ttf);
      }

      p{
        font-family: "bellerose";
      }

      select{
        border-radius: 8px;
        border: none;
        background-color: #590202;
        color: white;
        font-family: 'bellerose';
        padding-left: 5px;
        padding-bottom: 5px;
        font-size: 80%;
        width: 82%;
        margin-top: 70%;
      }
    </style>
  </head>
  <body>
    <?php
      require_once "menuP1.php";
      $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM pratos WHERE id = $id"); 
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    ?>
    </section>
      <div class="imgP">
        <section class="categorias">
          <div>
            <img src="<?php echo "../".$linha['imagem']?>"><br> 
            <p class="av">Gostaria de avaliar <br> &ensp;
             este prato? <a href="../../home/clfPrat/avaliarPrat.php?nome=<?php echo $linha['nome']?>" style="font-size: 1em; color: #D97904;">Avaliar</a></p>
          </div>
        </section>
      </div>
      <p class="textoCategoria"><?php echo $linha['nome']; } ?></p>

    <?php
        $pdo = Conexao::getInstance(); 
        $consulta = $pdo->query("SELECT * FROM pratos WHERE id = $id"); 
              while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {  
    ?>
    <div class="descricao">
      <form action="../../acao/acaoCarrinho.php?acao=ver&id=<?php echo $linha['id'];?>" method="POST">

      <input hidden readonly name="id" id="id" value="<?php if ($acao == "editar") echo $dados[0]['id']; 
        else echo 0; ?>">

        <h4 style="display: inline-block;">Descrição:</h4>
          <input hidden name="personalizar" id="personalizar" style="font-size: 1em;" value="<?php echo "Escreva aqui caso queira mudar algo no prato"?>"><br>
          <?php echo $linha['descricao'];?>
        <br>

        <h4 style="display: inline-block;">Ingredientes:</h4>
          <input hidden name="ingredientes" id="ingredientes" style="font-size: 1em;" value="<?php echo $linha['ingredientes'];?>"><br>
          <?php echo $linha['ingredientes'];?>
        <br>

        <h4 style="display: inline-block;">Preço:</h4>
          <input hidden name="preco" id="preco" style="font-size: 1em;" value="<?php echo $linha['preco'];?>"><br>
          <?php echo "R$ ". $linha['preco'];?>

        <h4>Quantidade:</h4>
          <input hidden type="number" name="prd1" id="prd1" value="1"> 
          <h4 id="prd1" name="prd1">1</h4>
    </div>
      <br>
    <?php
                    }
    ?>
    <center>
        <select name="mesa_id" id="mesa_id">
          <?php
            $pdo = Conexao::getInstance();
            $consulta = $pdo->query("SELECT id, nome FROM mesa");
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php echo $linha['id']?>">
            <?php echo $linha['nome'];?>
            </option>
          <?php } ?>
        </select>
    </center>

    <input hidden readonly name="pratos_id" id="pratos_id" value="<?php echo $id?>">

      <button name="acao" id="acao" type="submit" value="salvar" class="fim">Adicionar</button>
    </form>
  </body>
</html>