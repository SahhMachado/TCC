<?php
        include_once "../conf/Conexao.php";
        include_once "../classes/autoload.php";

        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        if ($acao == 'ver'){
            $mesaid = isset($_GET['mesa']) ? $_GET['mesa'] : "";
        if ($mesaid > 0)
            $dados = Mesa::listar(1, $mesaid);
        }

        //Login do usuário com sucesso, Login do usuário sem sucesso, Logout do usuário
        if(Cliente::efetuarLogin($_POST['email'], $_POST['senha'])) {
            header("Location:../home/index.php?acao=ver&mesa=$mesaid");
        } else if(isset($_POST['email']) && isset($_POST['senha'])) {
            echo "<center>Email ou senha incorretos!</center>";
            // header("Location:../../show/usuario/login.php");
        } else {
            header("Location:../home/login.php?acao=ver&mesa=$mesaid");
        }
?>