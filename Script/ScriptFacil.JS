document.addEventListener('DOMContentLoaded', function () { //quando a página é totalmente carregada
    começarTimer(); //inicia a contagem de tempo

    const obj_proximo = document.querySelector('.proximo')
    const array_Cartas = document.querySelectorAll('.carta')

    for (const carta of array_Cartas) {
        carta.addEventListener('click', FunApareceImagem)
    }

    let primeiraCarta = '';
    let segundaCarta = '';

    //verificar se há 12 cartas com a class match para saber se o jogo foi finalizado
    const verificarVencedor = () => {
        const cartasCorrespondentes = document.querySelectorAll('.match');
        if (cartasCorrespondentes.length === 12) {
            clearInterval(loop) //para o tempo
            //cria o cookie com o valor do tempo
            document.cookie = "tempo_jogo_facil=" + timerElement.innerHTML + "; path=/;";
            //Alerta de parabéns ao usuário
            alert(`Parabéns, você conseguiu em ${timerElement.innerHTML} segundos!!`);
            //remove a class proximo(que contém visibility: hidden do botão para próximo nível)
            obj_proximo.classList.remove('proximo');
        }
    }    

    //verifica se as cartas são iguais
    const checkCards = () => {
        if (primeiraCarta !== null && segundaCarta !== null) {
            const primeiroIa = primeiraCarta.dataset.ia;
            const segundoIa = segundaCarta.dataset.ia;
            
            //se forem iguais adiciona a class "match"
            if (primeiroIa === segundoIa) {
                primeiraCarta.firstChild.classList.add('match');
                segundaCarta.firstChild.classList.add('match');
                //deixa a primeira e segunda carta vazia
                primeiraCarta = '';
                segundaCarta = '';
                //e chama a função que verifica se há 12 cartas com a class match
                verificarVencedor();
                //se não forem iguais, apenas remove a class "mostrarCarta" e limpa as variáveis
            } else {
                setTimeout(() => { //em um certo tempo
                    primeiraCarta.classList.remove('mostrarCarta');
                    segundaCarta.classList.remove('mostrarCarta');
                    primeiraCarta = '';
                    segundaCarta = '';
                }, 500);
            }
        }
    }

    //função de mostrar a carta que foi clicada
    function FunApareceImagem(event) {
        const carta = event.currentTarget;
        if (carta.classList.contains('mostrarCarta')) {
            return;
        }
        if (primeiraCarta === '') { //verifica se está vazia, e após atribui uma carta a essa variavel
            carta.classList.add('mostrarCarta');
            primeiraCarta = carta;
            console.log(primeiraCarta);

        } else if (segundaCarta === '') { //verifica se está vazia, e após atribui uma carta a essa variavel
            carta.classList.add('mostrarCarta');
            segundaCarta = carta;
            console.log(segundaCarta);

            if (primeiraCarta !== null && segundaCarta !== null) { //se elas não estiverem vazias, vão para a função de checar se são iguais ou não
                checkCards();
            }
        }
    }
});
//Cronômetro
let loop;
const timerElement = document.querySelector('.timer'); //span da class timer
    const começarTimer = () => {
        loop = setInterval(() => {
        const tempoAtual = parseInt(timerElement.innerHTML);
        //se o valor do timer for igual a 30 (segundos)
        if (timerElement.innerHTML == 30) {
            clearInterval(loop); //deve parar o timer
            //alertar que o usuário que o tempo acabou
            const confirmacao = `Ahhh, que pena ${timerElement.innerHTML} segundos e você não conseguiu resolver esse jogo da memória... Deseja tentar novamente?`;
            //se ele optar por tentar novamente a página é recarregada 
            if (confirm(confirmacao)) {
                location.reload();
            //se não é redirecionado para a página de início
            }else{
                window.location.href = 'Inicio.php'
            }
        } 
        timerElement.innerHTML = tempoAtual + 1; //acrescenta o tempo de 1 em 1 segundo
    }, 1000);
}