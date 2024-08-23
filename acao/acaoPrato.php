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
        $prato = new Pratos($id, $imagem, $_POST['nome'], $_POST['ingredientes'], $_POST['descricao'], $_POST['preco'], 
        $_POST['categorias_id'], $_POST['gerente_id']);     
        $prato->excluir();
        header("location:../gerente/editP.php");
    }

$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        try{
        if ($id == 0){
            $prato = new Pratos("", $imagem, $_POST['nome'], $_POST['ingredientes'], $_POST['descricao'], $_POST['preco'], 
            $_POST['categorias_id'], $_POST['gerente_id']);     
            $prato->inserir();
            header("location:../gerente/editP.php");
        }else {
            $prato = new Pratos($_POST['id'], $imagem, $_POST['nome'], $_POST['ingredientes'], $_POST['descricao'], $_POST['preco'], 
            $_POST['categorias_id'], $_POST['gerente_id']);
            $prato->editar();
        }    
        header("location:../gerente/editP.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o Prato.<h1>
        <br> Erro: <br>".$e->getMessage();
    }     
}
?>