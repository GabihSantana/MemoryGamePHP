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
    <link rel="stylesheet" type="text/css" href="Estilo/EstiloInicio.css" />
    <link rel="icon" href="Imagens/ia.png" />

    <title>Página Inicial - Jogo da Memória</title>
</head>
<body>
    <main>
        <div class="Inicio">
            <div class="Informação">
                <form action="Informação.php">
                    <input type="submit" id="btnInfo" alt="Botão-Informativo" value="">
                </form>
            </div>
            <h1>Jogo da Memória</h1>        
            <h2>Inteligência Artificial</h2>
            <br>
            <div class="robo">
                <img src="Imagens/robo1.png" alt="">
            </div>
            <?php
                $nome = $_SESSION['Nome'];
                
                function mensagem($Usuario){
                    echo "<h3>Olá " . $Usuario . ", selecione a dificuldade: </h3>";
                }
                 mensagem($nome);
            ?>
            <br>
            <form action="Facil.php" method="get">
                <input type="submit" id="btnStart" value="Fácil" />
            </form>
            <form action="Medio.php" method="get">
                <input type="submit" id="btnStart" value="Médio" />
            </form>
            <form action="Dificil.php" method="get">
                <input type="submit" id="btnStart" value="Difícil" />
            </form>
            <form>
                <input type="submit" class="resumo" name="btnResumo" value="Resumo" />
                <input type="submit" class="sair" name="btnLogout" value="Sair" />
            </form>

            <?php
            //Verifica se o botão de sair foi clicado, e caso foi, pergunta ao usuário se ele tem certeza que deseja sair do jogo, evitando dessa forma possíveis erros e redirecionando o usuário para a página de logout(onde a session será encerrada):
                if(isset($_GET['btnLogout'])){
                    echo "<script>";
                    echo "const confirmacao = 'Você tem certeza que deseja sair?';";
                    echo "if (confirm(confirmacao)) {";
                    echo "window.location.href = 'logout.php';";
                    echo "}";
                    echo "</script>";
                }
                //Redireciona o usuário para a página de resumo de suas atividades
                if(isset($_GET['btnResumo'])){
                    header("Location: Resumo.php");
                }
            ?>
        </div>
    </main>
    
</body>
</html>