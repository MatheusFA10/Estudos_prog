function carregou(){
    var campoSaida = document.getElementById('saida');
    campoSaida.innerHTML = 'A pagina carregou';

    document.addEventListener('deviceready', dispositivoPronto, true);
    document.addEventListener('pause', parado, true);
    document.addEventListener('resume', retorno, true);

}

function dispositivoPronto(){
    var campoSaida = document.getElementById('saida');
    campoSaida.innerHTML += '<br>O Dispositivo esta pronto!';
}

function parado(){
    var campoSaida = document.getElementById('saida');
    campoSaida.innerHTML += '<br>Pausa!';
}

function retorno(){
    var campoSaida = document.getElementById('saida');
    campoSaida.innerHTML += '<br>Retorno!';
}
