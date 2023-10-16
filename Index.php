<?php
    session_start();
    if(isset($_GET['erro'])){
        echo "<script>";
        echo "const erro = 'Você precisa entrar no jogo primeiro!';";
        echo "alert(erro)";
        echo "</script>";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Imagens/ia.png" />
    <link rel="stylesheet" type="text/css" href="Estilo/EstiloLogin.css" />

    <link rel="icon" href="Imagens/ia.png" />

    <title>Página de Login</title>
</head>
<body>
    <div class="Login">
        <form method="get">
            <h2>Bem-Vindo ao</h2>     
            <h1> IA Memory Recall </h1>   
            <h3>Jogo da Memória de Inteligência Artificial</h3>
            <br>
            <label>
                Insira um nome: <br><br>
                <input type="text" name="inpName" />
                <br>
            </label>
            <br>     
            <p>
                <input type="submit" value="Jogar" name="btnEntrar">
            </p>
        </form>
        <div class="BoasVindas">
            <img src="Imagens/robo3.gif" alt="Robo acenando Oi">
        </div>
     </div>
    <footer>
        <img src="Imagens/robo1.png" alt="">
        <img src="Imagens/footer.png" alt="Imagem Cartas">
        <p>Desenvolvido por: Gabriela Santana Camilo</p>
        <p>©2023</p>
    </footer>
    <?php
        //verifica se o botão entrar foi acionado, e se foi guarda a variável de nome
        if(isset($_GET['btnEntrar'])){
            $usuario = isset($_GET['inpName'])? $_GET['inpName'] : null;

            $tamanho = strlen($usuario);
            //se usuário foi igual a null, alerta ao usuário a colocar um nome 
            if($usuario == null){
                echo "<script>";
                echo "const semNome = 'Por favor, insira um nome para jogar!';";
                echo "alert(semNome)";
                echo "</script>";
            }
            //caso seja 2 caracteres ou menos, alerta o usuário para colocar um nome maior
            else if($tamanho <= 2){
                echo "<script>";
                echo "const nomePequeno = 'Por favor, insira um nome com mais de 2 caracteres para jogar!';";
                echo "alert(nomePequeno)";
                echo "</script>";
            }
            //caso nenhum dos dois, o usuário é redirecionado para a página inicial do jogo, armazenando cookies de usuário e horário de login
            else{
                date_default_timezone_set("America/Sao_Paulo");
                setcookie("Usuário", $usuario, time() + (86400 * 30), "/");

                $login = date("H:i:s");
                setcookie("Data_login", $login, time() + (36400 * 3));
                $_SESSION['Data_login'] = $login;

                $_SESSION['Nome'] = $usuario;
                header("Location: Inicio.php");
            }
        }
    ?>
</body>
</html>
