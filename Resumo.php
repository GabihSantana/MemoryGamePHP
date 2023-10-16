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
    <link rel="stylesheet" type="text/css" href="Estilo/Estiloresumo.css" />
    <link rel="icon" href="Imagens/ia.png" />
    <title>Resumo de Jogo</title>
</head>
<body>
    <div class="Resumo">
        <?php
            $quantidade = 0;

            echo "<h2> " . $_SESSION['Nome'] . "</h2>";
            echo "Horário de Login: " . $_COOKIE['Data_login'];
            echo "<h3>Detalhes do seu desempenho: </h3>";

            //Caso o cookie de nenhuma partida estiver criado, deve retornar que não foi finalizado nenhum jogo
            if(!isset($_COOKIE['tempo_jogo_facil']) && !isset($_COOKIE['tempo_jogo_medio']) && !isset($_COOKIE['tempo_jogo_dificil'])) {
            echo "<h3>Nenhum jogo finalizado!</h3>";
            }
            //se o cookie do fácil for criado, deve retornar seu valor e somar 1 a quantidade
            if(isset($_COOKIE['tempo_jogo_facil'])) {
                $tempoFacil = $_COOKIE['tempo_jogo_facil'];
                echo "<p>Tempo gasto no nível fácil: ${tempoFacil} segundos</p>";
                $quantidade++;
            }
            //se o cookie do médio for criado, deve retornar seu valor e somar 1 a quantidade
            if(isset($_COOKIE['tempo_jogo_medio'])) {
                $tempoMedio = $_COOKIE['tempo_jogo_medio'];
                echo "<p>Tempo gasto no nível médio: ${tempoMedio} segundos</p>";
                $quantidade++;
            }
            //se o cookie do difícil for criado, deve retornar seu valor e somar 1 a quantidade
            if(isset($_COOKIE['tempo_jogo_dificil'])) {
                $tempoDificil = $_COOKIE['tempo_jogo_dificil'];
                echo "<p>Tempo gasto no nível difícil: ${tempoDificil} segundos</p>";
                $quantidade++;
            }
            //se qualquer um dos cookies existirem, deve imprimir a quantidade de níveis concluidos
            if(isset($_COOKIE['tempo_jogo_facil']) || isset($_COOKIE['tempo_jogo_medio']) || isset($_COOKIE['tempo_jogo_dificil'])){
                echo "<h4>* ${quantidade} nível(is) concluído(s)! *</h4>";
            }
        ?>
        <br>
        <form action="Inicio.php">
            <input type="submit" id="btnVoltar" name="btnVoltar" value="Início" />
        </form>
    </div>
    <div class="Robo">
        <img src="Imagens/robo3.gif" alt="Robo acenando">
    </div>
</body>
</html>
