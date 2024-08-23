<?php 
require_once("../classes/autoload.php"); 
include_once "../conf/default.inc.php";
require_once "../conf/Conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $cozinheiro = new Cozinheiro($id, $_POST['nome'], $_POST['dataNasc'], $_POST['cpf'], $_POST['email'], $_POST['senha']);     
        $cozinheiro->excluir();
        header("location:../cozinheiro/loginC.php");
    }

$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";

        try{
        if ($id == 0){
            $cozinheiro = new Cozinheiro("", $_POST['nome'], $_POST['dataNasc'], $_POST['cpf'], $_POST['email'], $_POST['senha']);     
            $cozinheiro->inserir();
            header("location:../cozinheiro/loginC.php");
        }else {
            $cozinheiro = new Cozinheiro($_POST['id'], $_POST['nome'], $_POST['dataNasc'], $_POST['cpf'], $_POST['email'], $_POST['senha']);
            $cozinheiro->editar();
        }    
        header("location:../cozinheiro/loginC.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o Cozinheiro.<h1>
        <br> Erro: <br>".$e->getMessage();
    }     
}
?>