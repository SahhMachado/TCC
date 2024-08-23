window.addEventListener("load",function() {
    if (window.Worker) {
        iniciar();
    }else{
        alert("Não suporta webworker");
    }
});

function iniciar() {
    if (typeof(Worker)!= "undefined") {
        if (typeof(w)== "undefined") {
            w = new Worker("../assets/js/webworker.js");
            w.onmessage = function (event) {
                if(confirm(event.data) == true){
                    w.postMessage('confirmado');
                }
            }
            w.postMessage('Iniciar');
        }
    }else{
        console.log("Erro");
    }
}