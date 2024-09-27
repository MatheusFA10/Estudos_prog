window.onload = function() {
    inicio();
}

let numeroCerto = gerarNumeroAleatorio();

function inicio() {
    var botao = document.getElementById('botao');
    botao.addEventListener('click', apertou);
}

function gerarNumeroAleatorio() {
    return Math.floor(Math.random() * 11); 
}

function apertou() {
    var campoSaida = document.getElementById('saida');
    var campoNumero = document.getElementById('numero');
    var digitado = campoNumero.value;

    if (digitado === '') {
        campoSaida.innerHTML = 'Por favor, insira um número!';
        return;
    }

    digitado = parseInt(digitado, 10);

    if (isNaN(digitado)) {
        campoSaida.innerHTML = 'Entrada inválida! Digite um número válido.';
        campoNumero.value = ''; 
        return;
    }

    if (digitado === numeroCerto) {
        campoSaida.innerHTML = 'Acertou! Um novo número foi gerado automaticamente. Tente adivinhar novamente!';
        numeroCerto = gerarNumeroAleatorio(); 
    } else if (digitado > numeroCerto) {
        campoSaida.innerHTML = 'Digite um número menor!';
    } else {
        campoSaida.innerHTML = 'Digite um número maior!';
    }

    campoNumero.value = '';
}