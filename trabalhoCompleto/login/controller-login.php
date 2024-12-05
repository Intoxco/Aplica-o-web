<?php
session_start();
require('view-login.php');

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ??'';
if(empty($_SESSION['logado']) && !$_SESSION['logado']) {
if(isset($_SESSION[$usuario]) && $_SESSION[$usuario]["senha"] == $senha){
    if($_SESSION[$usuario]["funcao"] == "professor"){
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $usuario;
        header('Location: ../professor/index-professor.php');
        exit();
    }
    else if($_SESSION[$usuario]["funcao"] == "aluno"){
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $usuario;
        header('Location: ../aluno/view-aluno.php');
        exit();
    }  
}if($usuario == 'admin' && $senha == '123'){
    $_SESSION['logado'] = true;
    $_SESSION['usuario'] = 'Admin';
    header('Location:../admin/controller-cadastro-aluno.php');
    exit();
}else if(!empty(($_POST))){
    $_SESSION['error'] = true;
}

}
else{
    if($_SESSION[$usuario]["funcao"] == "professor")
        header('Location: ../professor/index-professor.php');
    if($_SESSION[$usuario]["funcao"] == "aluno")
        header('Location: ../aluno/view-aluno.php');
    else
        header('Location:../admin/controller-cadastro-aluno.php');
}

