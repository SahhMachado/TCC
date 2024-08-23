<?php 
require_once("../classes/autoload.php"); 
include_once "../conf/default.inc.php";
require_once "../conf/Conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $idPed = isset($_GET['idPed']) ? $_GET['idPed'] : 0;
        $mesa = isset($_GET['mesa']) ? $_GET['mesa'] : "";

        $array =  array(
                "id" => $idPed,
                "status" => "Pronto",
                "mesa" => $mesa);
          
        // encode array to json
        $json = json_encode($array);
        //generate json file
        file_put_contents("../assets/json/pedidos.json", $json);
        
        $pedir = new Pedir($idPed, $_POST['nome_prat'], $_POST['descricao'], $_POST['preco'], $_POST['prd1'], $_POST['mesa_id']);     
        $pedir->excluir();
        header("location:../cozinheiro/pedidos.php?acao=ver&mesa=$mesa");
    }

$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_POST['idPed']) ? $_POST['idPed'] : "";
        $mesa = isset($_POST['mesa_id']) ? $_POST['mesa_id'] : "";

        try{
        if ($id == 0){
            $pedir = new Pedir("", $_POST['nome_prat'], $_POST['descricao'], $_POST['preco'], $_POST['prd1'], $_POST['mesa_id']);     
            $pedir->inserir();
            header("location:../home/index.php?acao=ver&mesa=$mesa");
        }else {
            $pedir = new Pedir($_POST['idPed'], $_POST['nome_prat'], $_POST['descricao'], $_POST['preco'], $_POST['prd1'], $_POST['mesa_id']);
            $pedir->editar();
        }    
        header("location:../home/index.php?acao=ver&mesa=$mesa");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o Pedido.<h1>
        <br> Erro: <br>".$e->getMessage();
    }     
}
?>