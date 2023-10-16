<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Estilo/EstiloInfo.css" />
    <link rel="icon" href="Imagens/info.png" />

    <title>Informação sobre o Jogo</title>
</head>
<body>
    <div class="Voltar">
        <form action="Inicio.php">
            <input type="submit" id="btnVoltar" alt="Botão-Voltar" value="">
        </form>
    </div>
    <div class="Info">
        <?php
            echo "<h1>Olá " . $_SESSION['Nome'] . ", seja bem-vindo(a) às informações sobre o nosso Jogo da Memória!</h1>";
        ?>
        <div class="Robo">
            <img src="Imagens/robo3.gif" alt="Robo acenando Oi">
        </div>
        <hr>
        <p>Nessa página sobre informações do jogo, temos como objetivo explicar o seu funcionamento de maneira simples e objetiva. Esperamos que você tenha uma boa experiência com nosso jogo. Vamos lá!</p>
        <h3>Pontos que serão abordados: </h3>
        <ul>
            <li><a href="#Obj">Objetivo do Jogo</a></li>
            <li><a href="#Jogar">Como Jogar</a></li>
            <li><a href="#Nível">Níveis e Tempos</a></li>
            <li><a href="#Resu">Desempenho do Jogador e Resumo do Jogo</a></li>

        </ul>

        <br><br>
        <h2 id="Obj">1. Qual o objetivo?</h2>
        <p>Nossa principal meta é proporcionar diversão! O jogo foi criado em torno do tema "Inteligência Artificial", devido ao seu crescimento exponencial nos dias atuais e sua relevância significativa para a atual sociedade.</p>
        <br>
        <h2 id="Jogar">2. Como Jogar?</h2>
        <p>É simples!! Assim como todo e qualquer jogo da memória, o nosso não é diferente. Dependendo do nível de dificuldade que você selecionar, sua tarefa será encontrar os pares correspondentes o mais rápido possível!</p>
        <br>

        <h2 id="Nível">3. Níveis</h2>
        <ul>
            <li><strong>Fácil:</strong> Conta com 6 pares de cartas - ou 12 cartas - e um tempo máximo de 30 segundos!</li>
        </ul>
            <div class="Telas">
            <figure>
                <img src="Imagens/InfoFacil1.jpg" alt="Imagem Jogo Inicio Fácil">
                <figcaption> Início do Jogo</figcaption>
                <img src="Imagens/InfoFacil2.jpg" alt="Imagem Jogo Completo Fácil">
                <figcaption> Jogo finalizado dentro do tempo </figcaption>
                <img src="Imagens/InfoFacil3.jpg" alt="Imagem Jogo Completo e botão próximo nível Fácil">
                <figcaption> Botão "Próxima Fase" no canto inferior direito </figcaption>
            </figure>
            </div>
            
        <ul>
            <li><strong>Médio:</strong> Conta com 9 pares de cartas - ou 18 cartas - e um tempo máximo de 40 segundos!</li>
        </ul>
            <div class="Telas">
            <figure>
                <img src="Imagens/InfoMedio1.jpg" alt="Imagem Jogo Inicio Médio">
                <figcaption> Início do Jogo</figcaption>
                <img src="Imagens/InfoMedio2.jpg" alt="Imagem Jogo Completo Médio">
                <figcaption> Jogo finalizado dentro do tempo </figcaption>
                <img src="Imagens/InfoMedio3.jpg" alt="Imagem Jogo Completo e botão para próximo nível Médio">
                <figcaption> Botão "Próxima Fase" no canto inferior direito </figcaption>
            </figure>
            </div>

        <ul>
            <li><strong>Difícil:</strong> Conta com 12 pares de cartas - ou 24 cartas - e um tempo máximo de 60 segundos!</li>
        </ul>
            <div class="Telas">
            <figure>
                <img src="Imagens/InfoDificil1.jpg" alt="Imagem Jogo Inicio Difícil">
                <figcaption> Início do Jogo</figcaption>
                <img src="Imagens/InfoDificil2.jpg" alt="Imagem Jogo Completo Difícil">
                <figcaption> Jogo finalizado dentro do tempo </figcaption>
                <img src="Imagens/InfoDificil3.jpg" alt="Imagem Jogo Completo e botão para Inicio">
                <figcaption> Botão "Início" no canto inferior direito </figcaption>
                <img src="Imagens/InfoDificil4.jpg" alt="Imagem Jogo sem tempo Difícil">
                <figcaption> Jogo finalizado devido ao tempo estipulado (60 segundos) </figcaption>
                </figure>
            </div>
            <br>
            <h2 id="Resu">4. Desempenho do Jogador</h2>
            <p>É possível checar seus tempos através do botão "Resumo" encontrado na página inicial. Ele armazena seu <strong>último tempo</strong> realizado em cada nível. É ótimo para competir com os amigos, assim, podem verificar quem conseguiu resolver o jogo da memória no menor tempo!</p>
            <div class="Telas">
                <figure>
                    <img src="Imagens/InfoResumo.jpg" alt="Botão Resumo destacado">
                    <figcaption> Botão de Resumo </figcaption>
                    <img src="Imagens/InfoResumo2.jpg" alt="Tela de Resumo do jogador">
                    <figcaption> Tela de resumo do jogador </figcaption>
                </figure>
            </div>
            <br><br>
            <form action="Inicio.php">
                <input type="submit" class="Jogar" name="btnJogar" value="Pronto para jogar!" />
            </form>
    </div>
    <br><br><br>
    <footer>
        <img src="Imagens/robo1.png" alt="">
        <img src="Imagens/footer.png" alt="Imagem Cartas">
        <p>Desenvolvido por: Gabriela Santana Camilo</p>
        <p>©2023</p>
    </footer>
</body>
</html>