<?php

require('paginaLogin.php');

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ??'';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);

session_start();

if($usuario == 'professor' && $senha =='123'){
    $_SESSION['logado'] = true;
    $_SESSION['usuario'] = 'Professor';

    header('Location: professor.php');
    exit();
}else if($usuario == 'aluno' && $senha =='123'){
    $_SESSION['logado'] = true;
    $_SESSION['usuario'] = 'Aluno';
    header('Location: aluno.php');
    exit();
}else if(!empty(($_POST))){
    $_SESSION['erro'] = 'USUÁRIO OU SENHA INCORRETOS';
}

if(!empty($_SESSION['logado']) && $_SESSION['logado']) {
    header('Location: professor.php');
}







