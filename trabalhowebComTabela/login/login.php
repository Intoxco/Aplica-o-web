<?php
session_start();
require('view-login.php');

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ??'';

if($usuario == 'professor' && $senha =='123'){
    $_SESSION['logado'] = true;
    $_SESSION['usuario'] = 'Professor';

    header('Location: ../professor/index-professor.php');
    exit();
}else if($usuario == 'aluno' && $senha =='123'){
    $_SESSION['logado'] = true;
    $_SESSION['usuario'] = 'Aluno';
    header('Location: ../aluno/aluno.php');
    exit();
}else if(!empty(($_POST))){
    $_SESSION['error'] = true;
}

if(!empty($_SESSION['logado']) && $_SESSION['logado']) {
    header('Location: ../professor/index-professor.php');
}