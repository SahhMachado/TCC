<style>
*{
    margin: 0;
    padding: 0;
}

header{
    background: #e0e0e0;
    color: white;
    margin: 0;
    font-size: 1.2em;
}

.menu{
    color: white;
    text-decoration: none;
    display: block;
    padding: 8px;
    cursor: pointer;
    font-size: 1em;
    letter-spacing: 3px;
    font-family: system-ui, -apple-system, Helvetica, Arial, sans-serif;
}

.menu{
    background-image: linear-gradient(to right, #D97904, #D97904 50%, #fff 50%);
    background-size: 200% 100%;
    background-position: -100%;
    display: inline-block;
    padding: 5px 0;
    position: relative;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    transition: all 0.3s ease-in-out;
}
  
.menu:before{
    content: '';
    background: #D97904;
    display: block;
    position: absolute;
    bottom: -3%;
    left: 0;
    width: 0;
    height: 6%;
    transition: all 0.3s ease-in-out;
}
  
.menu:hover {
   background-position: 0;
}
  
.menu:hover::before{
    width: 100%;
}

.mesa{
    border: 0.1em solid #FF9045;
    border-radius: 0.5em;
    padding: 0.2em;
}

.mesa:hover{
    color: #D97904;
}

ul{
    padding: 5px;
    list-style: none;
    position: relative;
    margin-top: 90%;
    width: 100%;
    display: inline-block;
}

label{
    left: 6%;
    position: relative;
    display: inline;
}

#check{
    display: none;
}

hr{
    width: 80%;
    margin-top: 5em;
}

nav{
    left: 50%;
    background-color: #590202;
    width: 50%;
    height: 250%;
    position: absolute;
    display: none;
    opacity: 75%;
    animation: fade-in 1s;
}

#check:checked ~ nav{
    display: block;
    animation: fade-in 1s;
}

@keyframes fade-in {
    from {
      opacity: 0;
    }
    to {
      opacity: 75%;
    }
}
  
  @keyframes fade-out {
    from {
      opacity: 75%;
    }
    to {
      opacity: 0;
    }
}
</style>
    <?php 
        require_once "../classes/autoload.php";
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
    <header>
        <a class="ftlogo" href="index.php?acao=ver&mesa=<?php echo $mesaid?>"><img src="../img/logo2.png" style="width: 8em; margin-top: 4.2px; margin-left: 1.5em; display: inline-block;"></a>
        <a class="notificacao" href="#"><img src="../img/notificacao.png" style="width: 1.1em; margin-left: 4em; display: inline-block;"></a>
        <a href="carrinho.php?acao=ver&mesa=<?php echo $mesaid?>"><img src="../img/carrinho.png" style="width: 1em; margin-left: 1em; display: inline-block;"></a>
        <input type="checkbox" id="check">
            <label for="check">
                <img src="../img/menu.svg" alt="" style="width: 2em; cursor: pointer; display: inline-block;">
            </label>
        <nav>
            <center>
            <ul>
                <li class="mesa" style="margin-top: 3em;"><?php echo "Mesa ".$mesaid;?></li>
                <li><a href="avaliar.php" class="menu" style="margin-top: 5em;">Avaliar</a></li>
                <li><a href="comentarios.php" class="menu" style="margin-top: 5em;">Reclamações <br>e comentários</a></li>
                <hr>
                <li><a href="../controle/controleLogin.php" class="menu" style="margin-top: 1em;">Sair</a></li>
            </ul>
            </center>
        </nav>
    </header>