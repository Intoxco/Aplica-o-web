<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login/view-login.php');
    exit();
}

if ($_SESSION[$_SESSION["usuario"]]["funcao"] == 'aluno') {
    $mensagem = "Você não tem permissão para acessar esta página.";
    $botao = "Ir para minha área";
    $urlBotao = "../aluno/view-aluno.php";
    $acaoBotao = "deslogar";
} else if($_SESSION[$_SESSION["usuario"]]["funcao"] == "professor"){
    $mensagem = "Você não tem permissão para acessar esta página";
    $botao = "Ir para minha área";
    $urlBotao = "../professor/index-professor.php";
    $acaoBotao = "deslogar";
}else{
$erro = $_SESSION['erro'] ?? '';
$sucesso = $_SESSION['sucesso'] ?? '';

unset($_SESSION['erro']);
unset($_SESSION['sucesso']);
}
if ($_POST["envio"]== "true"){
    if(isset($_SESSION[$_POST["alunoLogin"]])){
        $_SESSION['erro'] = "O login inserido já está em uso!";
        header("Location: controller-cadastro-aluno.php");
        exit();
    }
    $_SESSION['sucesso'] = 'Dados recebidos e válidos!';
    $_SESSION[$_POST["alunoLogin"]] = ["senha" => $_POST["alunoSenha"], "nome"=> $_POST["alunoNome"],
                                  "idade"=>$_POST["alunoIdade"],"alunoResponsavel"=>$_POST["alunoResponsavel"],
                                  "turma"=>$_POST["alunoTurma"],"funcao"=>"aluno"];
    header("Location: controller-cadastro-aluno.php");
}
require "view-cadastro-aluno.view.php";
