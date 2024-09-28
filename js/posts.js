var numero = 1; 

window.onload = function() {
    document.addEventListener('deviceready', pronto, false);
    window.addEventListener('scroll', detectarInicioScroll);
}

function debug(e) {
    console.log('evento:  ' + e.type);
}

function pronto() {
    var botao = document.getElementById('botao');
    botao.addEventListener('click', buscaPost);
}

function buscaPost() {
    var campoNumero = document.getElementById('num');
    numero = campoNumero.value;

    var endereco = "https://jsonplaceholder.typicode.com/posts/" + numero;

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        var objetoRecebido = JSON.parse(this.responseText);
        var titulo = objetoRecebido.title;
        var corpo = objetoRecebido.body;

        var campoTitulo = document.getElementById('title');
        campoTitulo.innerHTML = titulo;

        var campoCorpo = document.getElementById('body');
        campoCorpo.innerHTML = corpo;
    }
    xhttp.open("GET", endereco, true);
    xhttp.send();
}

function detectarInicioScroll() {
    
    if (window.scrollY === 0) {
        
        var campoNumero = document.getElementById('num');
        var campoTitulo = document.getElementById('title');
        var campoCorpo = document.getElementById('body');

        campoNumero.value = ''; 
        campoTitulo.innerHTML = ''; 
        campoCorpo.innerHTML = ''; 
    }
}
