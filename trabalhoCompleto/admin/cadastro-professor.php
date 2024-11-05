<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login/login.php');
    exit();
}

if ($_SESSION[$_SESSION["usuario"]] === 'Aluno') {
    $mensagem = "Você não tem permissão para acessar esta página.";
    $botao = "Ir para minha área";
    $urlBotao = "../aluno/aluno.php";
    $acaoBotao = "deslogar";
    exit();
} else if($_SESSION[$_SESSION["usuario"]] === 'Professor'){
    $mensagem = "Você não tem permissão para acessar esta página";
    $botao = "Ir para minha área";
    $urlBotao = "../professor/index-professor.php";
    $acaoBotao = "deslogar";
    exit();
}else{

$erro = $_SESSION['erro'] ?? '';
$sucesso = $_SESSION['sucesso'] ?? '';

unset($_SESSION['erro']);
unset($_SESSION['sucesso']);
}
if ($_POST["envio"]== "true"){
    if(isset($_SESSION[$_POST["professorLogin"]])){
        $_SESSION['erro'] = "O login inserido já está em uso!";
        header("Location: cadastro-professor.php");
        exit();
    }
    $_SESSION['sucesso'] = 'Dados recebidos e válidos!';
    $_SESSION[$_POST["professorLogin"]] = ["senha" => $_POST["professorSenha"], "nome"=> $_POST["professorNome"],
                                  "idade"=>$_POST["alunoIdade"],
                                  "materia"=>$_POST["professorMateria"],"funcao"=>"professor"];
    header("Location: cadastro-professor.php");
}
require 'cadastro-professor.view.php';
