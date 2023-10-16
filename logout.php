<?php
    //zerando os cookies:
    setcookie('tempo_jogo_facil', '', time() - 3600, '/');
    setcookie('tempo_jogo_medio', '', time() - 3600, '/');
    setcookie('tempo_jogo_dificil', '', time() - 3600, '/');
    //unset para garantir que os cookies sejam removidos do array de cookies do PHP
    unset($_COOKIE['tempo_jogo_facil']);
    unset($_COOKIE['tempo_jogo_medio']);
    unset($_COOKIE['tempo_jogo_dificil']);
    //encerrar as sessoes:
    session_start();
    session_unset();
    session_destroy();
   
    //redirecionar para a página de login
   header('Location: Index.php');   
   exit;
?>