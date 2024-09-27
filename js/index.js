window.onload = function() {
    document.addEventListener('deviceready', inicio, false);
}

let numeroCerto = 7; // Valor inicial padrão

function inicio() {
    var botao = document.getElementById('botao');
    botao.addEventListener('click', apertou);
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

    if (digitado === numeroCerto) {
        campoSaida.innerHTML = 'Acertou! Insira um novo número a ser adivinhado:';
        let novoNumero = prompt('Parabéns! Você acertou. Digite um novo número para o próximo jogo:');

        if (novoNumero !== null && !isNaN(novoNumero)) {
            numeroCerto = parseInt(novoNumero, 10);
            campoSaida.innerHTML = 'Novo jogo! Tente adivinhar o novo número.';
        } else {
            campoSaida.innerHTML = 'Número inválido. O jogo continuará com o número atual.';
        }
    } else if (digitado > numeroCerto) {
        campoSaida.innerHTML = 'Digite um número menor!';
    } else {
        campoSaida.innerHTML = 'Digite um número maior!';
    }

    // Limpa o campo de entrada
    campoNumero.value = '';
}