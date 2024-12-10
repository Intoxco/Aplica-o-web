<?php 
session_start();
require_once "../model/conexao.php";
require_once "../model/model-cadastro-professor.php";
require_once "../entities/Professor.php";
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login/controller-login.php');
    exit();
}

if ($_SESSION[$_SESSION["funcao"]] === 'Aluno') {
    $mensagem = "Você não tem permissão para acessar esta página.";
    $botao = "Ir para minha área";
    $urlBotao = "../aluno/view-aluno.php";
    $acaoBotao = "deslogar";
    exit();
} else if($_SESSION[$_SESSION["funcao"]] === 'Professor'){
    $mensagem = "Você não tem permissão para acessar esta página";
    $botao = "Ir para minha área";
    $urlBotao = "../professor/controller-professor.php";
    $acaoBotao = "deslogar";
    exit();
}else{

$erro = $_SESSION['erro'] ?? '';
$sucesso = $_SESSION['sucesso'] ?? '';

unset($_SESSION['erro']);
unset($_SESSION['sucesso']);
}
if ($_POST["envio"]== "true"){
    $resultado = validarLogin($bd,$_POST["professorLogin"]);
    if(!empty($resultado)){
        $_SESSION['erro'] = "O login inserido já está em uso!";
        header("Location: controller-cadastro-professor.php");
        exit();
    }
    $_SESSION['sucesso'] = 'Dados recebidos e válidos!';
    $professor = new Professor($_POST["professorNome"],$_POST["professorDataNascimento"],0,$_POST["professorLogin"],$_POST["professorSenha"]);
    cadastrarProfessor($bd,professor: $professor);
    header("Location: controller-cadastro-professor.php");
    exit();
}
require 'view-cadastro-professor.php';
