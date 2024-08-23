<?php 
require_once("../classes/autoload.php"); 
include_once "../conf/default.inc.php";
require_once "../conf/Conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $cat = new Mesa($id, $_POST['nome']);     
        $cat->excluir();
        header("location:../gerente/mesas.php");
    }

$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";

        try{
        if ($id == 0){
            $cat = new Mesa("", $_POST['nome']);     
            $cat->inserir();
            header("location:../gerente/mesas.php");
        }else {
            $cat = new Mesa($_POST['id'], $_POST['nome']);
            $cat->editar();
        }    
        header("location:../gerente/mesas.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar a Mesa.<h1>
        <br> Erro: <br>".$e->getMessage();
    }     
}
?>