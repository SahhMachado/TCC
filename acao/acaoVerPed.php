<?php
   header("Content-Type: application/json");
   $arquivo = "../assets/json/pedidos.json";
   $acao = isset($_GET['acao']) ? $_GET['acao'] : "";

   if (file_exists($arquivo)) {
    if ($acao == "confirmado") {
        $json = json_decode(file_get_contents($arquivo));
        $json->status = "Finalizado";
        $editado = file_put_contents($arquivo,json_encode($json));
    }else{
        $json = file_get_contents('../assets/json/pedidos.json');
        $data = json_decode($json);

        if ($data->status == "Pronto"){
            $str = "Pedido pronto!";
        }else{
            die;
        }
        echo json_encode($str);
   }
}else{
       echo json_encode("Erro");
   }
?>