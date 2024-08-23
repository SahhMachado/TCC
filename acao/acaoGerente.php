<?php 
require_once("../classes/autoload.php"); 
include_once "../conf/default.inc.php";
require_once "../conf/Conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $gerente = new Gerente($id, $_POST['nome'], $_POST['dataNasc'], $_POST['cpf'], $_POST['email'], $_POST['senha']);     
        $gerente->excluir();
        header("location:../gerente/loginG.php");
    }

$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";

        try{
        if ($id == 0){
            $gerente = new Gerente("", $_POST['nome'], $_POST['dataNasc'], $_POST['cpf'], $_POST['email'], $_POST['senha']);     
            $gerente->inserir();
            header("location:../gerente/loginG.php");
        }else {
            $gerente = new Gerente($_POST['id'], $_POST['nome'], $_POST['dataNasc'], $_POST['cpf'], $_POST['email'], $_POST['senha']);
            $gerente->editar();
        }    
        header("location:../gerente/loginG.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o Gerente.<h1>
        <br> Erro: <br>".$e->getMessage();
    }     
}
?>