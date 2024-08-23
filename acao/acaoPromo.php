<?php 
require_once("../classes/autoload.php"); 
include_once "../conf/default.inc.php";
require_once "../conf/Conexao.php";

$pathToSave = "../gerente/img/";
    if ($_FILES) { // Verificando se existe o envio de arquivos.
        if ($_FILES['imagem']) { // Verifica se o campo não está vazio.
            $dir = $pathToSave; // Diretório que vai receber o arquivo.
            $tmpName = $_FILES['imagem']['tmp_name']; // Recebe o arquivo temporário.
            $name = $_FILES['imagem']['name']; // Recebe o nome do arquivo.
            preg_match_all('/\.[a-zA-Z0-9]+/', $name, $extensao);
            if (!in_array(strtolower(current(end($extensao))), array('.txt', '.pdf', '.doc', '.xls', '.xlms', '.docx', '.jpeg', 'png', '.jpg'))) {
                echo('Permitido apenas arquivos doc, xls, pdf, docx, txt, jpeg, png e jpg.');
                die;
            }
            move_uploaded_file($tmpName, $dir.$name);
            $imagem = "../gerente/img/".$_FILES['imagem']['name'];
        }  
    }

$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $promo = new Promo($id, $_POST['dia'], $imagem, $_POST['descricao'], $_POST['gerente_id'], $_POST['pratos_id']);     
        $promo->excluir();
        header("location:../gerente/ExPromo.php");
    }

$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";

        try{
        if ($id == 0){
            $promo = new Promo("", $_POST['dia'], $imagem, $_POST['descricao'], $_POST['gerente_id'], $_POST['pratos_id']);     
            $promo->inserir();
            header("location:../gerente/edit.php");
        }else {
            $promo = new Promo($_POST['id'], $_POST['dia'], $imagem, $_POST['descricao'], $_POST['gerente_id'], $_POST['pratos_id']);
            $promo->editar();
        }    
        header("location:../gerente/edit.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar a Promoção.<h1>
        <br> Erro: <br>".$e->getMessage();
    }     
}
?>