this.onmessage = function (message){
    if(message.data === "Iniciar"){
        setInterval(function(){
                getpedido();
        },10000);
    }else if(message.data === "confirmado"){
        pedidoConfirmado();
    }
}

function getpedido() {
    xhr = new XMLHttpRequest();
    xhr.open('GET', '../../acao/acaoVerPed.php');
    xhr.addEventListener('load', (data) => {
        datajson = JSON.parse(data.target.responseText);
        // console.log(data);
        postMessage(datajson);
    });
    xhr.send();
}

function pedidoConfirmado() {
    xhr = new XMLHttpRequest();
    xhr.open('GET', '../../acao/acaoVerPed.php?acao=confirmado');
    xhr.addEventListener('load', (data) => {
        datajson = JSON.parse(data.target.responseText);
        // console.log(data);
        postMessage(datajson);
    });
    xhr.send();
}