<?php
    session_start();
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
    <title>Nível: Difícil</title>
</head>
<body>
    <main>
        <div class="Dificil">
            <div class="Inicio">
                <?php
                    //Parte superior dos tabuleiros: Nome, tempo e nível:
                    echo "Jogador: " . $_SESSION['Nome'] . "   ";
                    $tempo = '<span>Tempo: <span class="timer">00</span></span>';
                    echo $tempo;
                    echo "Nível: Difícil";
                ?>
            </div>
            <hr>
            <?php    
                $organização = array();
                //array de definição das imagens: Nível médio com 12 imagens
                $imagens = array(
                    'Imagens/Cartas/IA.jpg',
                    'Imagens/Cartas/IA1.jpg',
                    'Imagens/Cartas/IA_aprende.jpg',
                    'Imagens/Cartas/IA_aprende2.jpg',
                    'Imagens/Cartas/IA_aprendizado.jpg',
                    'Imagens/Cartas/IA_aprendizado2.jpg',
                    'Imagens/Cartas/IA_class.jpg',
                    'Imagens/Cartas/IA_class2.jpg',
                    'Imagens/Cartas/IA_dia.jpg',
                    'Imagens/Cartas/IA_dia2.jpg',
                    'Imagens/Cartas/IA_etc.jpg',
                    'Imagens/Cartas/IA_etc2.jpg'
                );
                $tamanho = count($imagens);

                echo '<div class="cartasDificil">';
                //Função para formar as cartas dos jogos: 
                function formaCartas($tamanho, $imagens)
                {
                    global $organização;
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
                    //Chamando a função duas vezes para formar as duplas (repetir as imagens da array Imagens) 24 cartas
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
            <form action="Inicio.php" method="get">
                <input type="submit" class="proximo" value="Inicio" />
            </form>
            <?php
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
    <script src="Script/ScriptDificil.JS">
    </script>
</body>
</html>
