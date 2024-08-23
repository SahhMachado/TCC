<?php 
require_once("../classes/autoload.php"); 
include_once "../conf/default.inc.php";
require_once "../conf/Conexao.php";
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$mesa = isset($_GET['mesa']) ? $_GET['mesa'] : 0;

if(isset($_POST['acao'])){ $acao = $_POST['acao'];}elseif(isset($_GET['acao'])){ $acao = $_GET['acao'];}else{ $acao = "";}
    if ($acao == "excluir"){
        $Carrinho = new Carrinho($id, $_POST['personalizar'], $_POST['ingredientes'], $_POST['preco'], $_POST['prd1'], $mesa, $_POST['pratos_id']);     
        $Carrinho->excluir();
        header("location:../home/carrinho.php?acao=ver&mesa=$mesa");
    }
    if ($acao == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $mesa = isset($_POST['mesa_id']) ? $_POST['mesa_id'] : "";

        try{
        if ($id == 0){
            $Carrinho = new Carrinho("", $_POST['personalizar'], $_POST['ingredientes'], $_POST['preco'], $_POST['prd1'], $_POST['mesa_id'], $_POST['pratos_id']);     
            $Carrinho->inserir();
            header("location:../home/carrinho.php?acao=ver&mesa=$mesa");
        }else {
            $Carrinho = new Carrinho($_POST['id'], $_POST['personalizar'], $_POST['ingredientes'], $_POST['preco'], $_POST['prd1'], $_POST['mesa_id'], $_POST['pratos_id']);
            $Carrinho->editar();
        }    
        header("location:../home/carrinho.php?acao=ver&mesa=$mesa");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar no Carrinho.<h1>
        <br> Erro: <br>".$e->getMessage();
    }     
}
?>