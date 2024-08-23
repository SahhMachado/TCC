<?php 
require_once("../classes/autoload.php"); 
include_once "../conf/default.inc.php";
require_once "../conf/Conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $cliente = new Cliente($id, $_POST['nome'], $_POST['dataNasc'], $_POST['email'], $_POST['senha']);     
        $cliente->excluir();
        header("location:../home/login.php");
    }

$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $mesaid = isset($_GET['mesa']) ? $_GET['mesa'] : "";

        try{
        if ($id == 0){
            $cliente = new Cliente("", $_POST['nome'], $_POST['dataNasc'], $_POST['email'], $_POST['senha']);     
            $cliente->inserir();
            header("location:../home/login.php?acao=ver&mesa=$mesaid");
        }else {
            $cliente = new Cliente($_POST['id'], $_POST['nome'], $_POST['dataNasc'], $_POST['email'], $_POST['senha']);
            $cliente->editar();
        }    
        header("location:../home/login.php?acao=ver&mesa=$mesaid");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o Cliente.<h1>
        <br> Erro: <br>".$e->getMessage();
    }     
}
?>