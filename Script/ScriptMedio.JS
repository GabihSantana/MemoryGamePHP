document.addEventListener('DOMContentLoaded', function () {
    começarTimer();

    const obj_proximo = document.querySelector('.proximo');
    const array_Cartas = document.querySelectorAll('.carta')

    for (const carta of array_Cartas) {
        carta.addEventListener('click', FunApareceImagem);
    }

    let primeiraCarta = '';
    let segundaCarta = '';

    const verificarVencedor = () => {
        const cartasCorrespondentes = document.querySelectorAll('.match');
        if (cartasCorrespondentes.length === 18) {
            clearInterval(loop)

            document.cookie = "tempo_jogo_medio=" + timerElement.innerHTML + "; path=/;";

            alert(`Parabéns, você conseguiu em ${timerElement.innerHTML} segundos!!`);
            obj_proximo.classList.remove('proximo');
        }
    }    

    const checkCards = () => {
        if (primeiraCarta !== null && segundaCarta !== null) {
            const primeiroIa = primeiraCarta.dataset.ia;
            const segundoIa = segundaCarta.dataset.ia;
            
            if (primeiroIa === segundoIa) {
                primeiraCarta.firstChild.classList.add('match');
                segundaCarta.firstChild.classList.add('match');

                primeiraCarta = '';
                segundaCarta = '';

                verificarVencedor();

            } else {
                setTimeout(() => {
                    primeiraCarta.classList.remove('mostrarCarta');
                    segundaCarta.classList.remove('mostrarCarta');
                    primeiraCarta = '';
                    segundaCarta = '';

                }, 500);
            }
        }
    }

    function FunApareceImagem(event) {
        const carta = event.currentTarget;
        if (carta.classList.contains('mostrarCarta')) {
            return;
        }
        if (primeiraCarta === '') {
            carta.classList.add('mostrarCarta');
            primeiraCarta = carta;
            console.log(primeiraCarta);

        } else if (segundaCarta === '') {
            carta.classList.add('mostrarCarta');
            segundaCarta = carta;
            console.log(segundaCarta);

            if (primeiraCarta !== null && segundaCarta !== null) {
                checkCards();
            }
        }
    }
});

let loop;
const timerElement = document.querySelector('.timer');

    const começarTimer = () => {
        loop = setInterval(() => {
        const tempoAtual = parseInt(timerElement.innerHTML);
        if (timerElement.innerHTML == 40) {
            clearInterval(loop);
            const confirmacao = `Ahhh, que pena ${timerElement.innerHTML} segundos e você não conseguiu resolver esse jogo da memória... Deseja tentar novamente?`;
            if (confirm(confirmacao)) {
                location.reload();
            }else{
                window.location.href = 'Inicio.php'
            }
        } 
        timerElement.innerHTML = tempoAtual + 1;
    }, 1000);
}
