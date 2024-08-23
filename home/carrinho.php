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
    <link rel="stylesheet" href="../css/estilos1.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet"> -->
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <script>
        // function excluirRegistro(url){
        //     if (confirm("Confirma Exclusão?"))
        //         location.href = url;
        // }

        function confirmar() {
            var element = document.getElementById("confirmar");
            element.classList.toggle("show-modal");
        }

        function closeConfirmar() {
            var element = document.getElementById("confirmar");
            element.classList.remove("show-modal");
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

      .confirmar{
          z-index:1;
          position: fixed;
          top:0;
          left:0;
          padding:0rem;
          display: flex;
          justify-content: center;
          align-items: center;
          width: 100%;
          height: 100%;
          background-color: rgba(0,0,0,0.75);
          opacity: 0;
          visibility: hidden;
          transform: scale(1.1);
          transition: visibility 0.25s ease-in-out , opacity 0.25s ease-in-out, transform 0.25s ease-in-out;  
      }

      .show-modal{
          opacity: 1;
          visibility: visible;
          transform: scale(1.0);    
      }


      .confirmar-content{
          background-color: white;
          padding: 20px;    
          width: 384px;
          border-radius: 0.5rem;
          
      }
      .close-button{
        float: right;
        width: 24px;
        line-height: 24px;
        text-align: center;
        cursor: pointer;
        border-radius: 0.25rem;
        background-color: transparent;
      }

      .confirmar-content h1{
          color: black;
          font-size: 20px;
          font-weight: 200;
          margin-bottom: 2rem;
      }

      .confirmar-content a{
          color: black;
      }

      .confirmar-content a:hover{
          color: white;
      }

      .div-botao-modal{
          display: flex;
          justify-content: space-between;
      }

      .div-botao-modal button{
          font-size: 1.3rem;
      }

      .btn-modal{
          background-color: transparent;
          border: 2px solid #D97904;
          color: black;
          display: flex;
          justify-content: center;
          align-items: center;
          width: 10rem;
          padding-top: 0.5rem;
          padding-bottom: 0.5rem;
          transition: 0.3s;
          width: 150px;
          border-radius: 0.25rem;

      }

      .btn-modal:hover{
          background-color: #D97904;
          color: white;
      }
    </style>
  </head>
  <body>
    <?php
        require_once "menu2.php";
    ?>
    <br>
    <h1>Meu Carrinho</h1>
      <section class="carrinho">
      <?php
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT carrinho.id, imagem, nome, personalizar, carrinho.preco, quant, mesa_id FROM pratos, carrinho WHERE pratos.id = carrinho.pratos_id AND mesa_id = $mesaid"); 
        $lista = Carrinho::listar($cnst, $procurar);
        foreach ($consulta as $linha) {
      ?>
      <div class="list"> 
        <img src="<?php echo $linha['imagem']?>">
        <form action="../acao/acaoPedir.php?acao=ver&id=<?php echo $linha['id'];?>" method="post">

          <input type="text" hidden id="idPed" name="idPed" value="<?php if ($acao == "editar") echo $dados[0]['idPed']; 
          else echo 0; ?>">

          <input type="text" id="nome_prat" hidden name="nome_prat" value="<?php echo $linha['nome'];?>">

          <input type="text" hidden name="descricao" id="descricao" value="<?php echo $linha['personalizar'];?>">
          <p class="textoItensCarrinho" style="margin-bottom: 1%;">Descrição: <?php echo $linha['personalizar'];?></p>

          <input type="text" hidden name="preco" id="preco" value="<?php echo $linha['preco'];?>">
          <input type="hidden" name="prd1" id="prd1" value="<?php echo $linha['quant'];?>">
          <input type="text" hidden name="mesa_id" id="mesa_id" value="<?php echo $linha['mesa_id'];?>">

          <p class="textoItensCarrinho" style="margin-bottom: 0%; display: inline;">Quantidade:</p>
          <p class="textoItensCarrinho" style="margin-bottom: 0%;" id="prd1" name="prd1"><?php echo $linha['quant'];?></p>
          <p class="textoItensCarrinho" style="margin-bottom: 1%;">Preço: <?php echo $linha['preco'];?></p>
          <?php $total = $linha['preco'] * $linha['quant'];?>
          <p class="textoItensCarrinho" style="margin-bottom: 1%;">Total: R$ <?php echo $total;?></p>
      </div>
      <button name="acao" id="acao" type="submit" value="salvar" class="pedir">Pedir</button>
      </form>
      <div class="bot">
          <button class="edit"><a href='../cadastro/cadCarrinho.php?acao=editar&id=<?php echo $linha['id'];?>'>
          <img src='../img/editar2.svg' style="width: 0.8em; display: inline-block;"></a></button>
          <button class="del"><a href="../acao/acaoCarrinho.php?acao=excluir&id=<?php echo $linha['id'];?>&mesa=<?php echo $linha['mesa_id'];?>"><img src='../img/excluir2.svg' style='width: 0.8em; margin-bottom: 0.3em; display: inline-block;'></a></button>
          <!-- <button class="del"><a onclick="confirmar()"><img src='../img/excluir2.svg' style='width: 0.8em; margin-bottom: 0.3em; display: inline-block;'></a></button> -->
      </div>
      <?php } ?>
    </section>
    <!-- <div class="confirmar" id="confirmar">
        <div class="confirmar-content">
            <a>
                <span class="close-button" onclick="closeConfirmar()">
                        &times;
                </span>
            </a>
            <h1>Deseja excluir o item?</h1>
            <div class="div-botao-modal">
                <a style="text-decoration: none;" href="../acao/acaoCarrinho.php?acao=excluir&id=<?php echo $linha['id'];?>&mesa=<?php echo $linha['mesa_id']?>"><button type="button"class="btn-modal">Sim</button></a>
                <a onclick="closeConfirmar()" style="text-decoration: none;"><button type="button" class="btn-modal">Não</button></a>
            </div>
        </div>
    </div> -->
  </body>
</html>