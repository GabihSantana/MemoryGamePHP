<?php
    session_start();
    //Verificar se está logado, se não estiver, o usuário é redirecionado para a página de login
    if(!(isset($_SESSION['Nome']))){
        header("Location: Index.php?erro=true");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Imagens/ia.png" />
    <link rel="stylesheet" type="text/css" href="Estilo/EstiloJogos.css" />
    <title>Nível: Fácil</title>
</head>
<body>
    <main>
        <div class="Facil">
            <div class="Inicio">
                <?php
                    //Parte superior dos tabuleiros: Nome, tempo e nível:
                    echo "Jogador: " . $_SESSION['Nome'] . "   ";
                    $tempo = '<span>Tempo: <span class="timer">00</span></span>';
                    echo $tempo;
                    echo "Nível: Fácil";
                ?>
            </div>
            <hr>
            <?php    
                //As cartas do jogo - Definidas em Array's:
                $organização = array();//Array que as imagens irão ser armazenadas

                //array de definição das imagens
                $imagens = array(
                    'Imagens/Cartas/IA.jpg',
                    'Imagens/Cartas/IA1.jpg',
                    'Imagens/Cartas/IA_aprende.jpg',
                    'Imagens/Cartas/IA_aprende2.jpg',
                    'Imagens/Cartas/IA_aprendizado.jpg',
                    'Imagens/Cartas/IA_aprendizado2.jpg'
                );

                $tamanho = count($imagens);

                //div para formar o tabuleiro no CSS
                echo '<div class="cartasFacil">';

                //Função para formar as cartas dos jogos: 
                function formaCartas($tamanho, $imagens)
                {
                    global $organização;
                    //for contando com classes que irão auxiliar na estrutura do JS e CSS
                    for ($i = 0; $i < $tamanho; $i++){
                        $organização[] = 
                        '<div class="carta" data-ia="' . $i . '">' .
                            '<div class="Imagem Frente">' . 
                                '<img src="' . $imagens[$i] . '">' . '
                            </div>' . 
                            '<div class="Imagem Trás">' . 
                                '<img src="Imagens/Cartas/carta.jpg" id="Imagem-Fundo">' . 
                            '</div>' . 
                        '</div>';
                    }
                }
                //Chamando a função duas vezes para formar as duplas (repetir as imagens da array Imagens) 12 cartas
                formaCartas($tamanho, $imagens);
                formaCartas($tamanho, $imagens);

                //Embaralhando duas vezes a array / embaralhando as cartas:
                shuffle($organização);
                shuffle($organização);

                //Mostrando as cartas na tela para o jogador após serem embaralhadas:
                foreach ($organização as $ImagemCarta) {
                    echo $ImagemCarta;
                }
            ?>
            <hr>
        </div>

        <div class="PróximoNivel">
            <form>
                <input type="submit" name="btnVoltar" value="Início" />
            </form>
            <form action="Medio.php" method="get">
                <input type="submit" class="proximo" value="Próxima Fase" />
            </form>
            <?php
                //Verifica se o botão foi clicado, e caso foi, pergunta ao usuário se ele tem certeza que deseja sair da página, evitando dessa forma possíveis erros:
               if(isset($_GET['btnVoltar'])){
                    echo "<script>";
                    echo "const confirmacao = 'Você tem certeza que deseja voltar para o início?';";
                    echo "if (confirm(confirmacao)) {";
                    echo "window.location.href = 'Inicio.php';";
                    echo "}";
                    echo "</script>";
                }
            ?>
        </div>
    </main>
    <script src="Script/ScriptFacil.JS"></script>
</body>
</html>
