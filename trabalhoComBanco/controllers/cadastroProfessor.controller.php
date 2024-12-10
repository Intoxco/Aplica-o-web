<?php 
session_start();
require_once __DIR__ . '/../model/conexao.php';
require_once __DIR__ . '/../model/model-cadastro-professor.php';
require_once __DIR__ . '/../entities/Professor.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: ../controllers/login.controller.php');
    exit();
}

if ($_SESSION["funcao"] === 'Aluno') {
    $mensagem = "Você não tem permissão para acessar esta página.";
    $botao = "Ir para minha área";
    $urlBotao = "../controllers/alunoBoletim.controller.php";
    $acaoBotao = "deslogar";
    exit();
} else if($_SESSION["funcao"] === 'Professor'){
    $mensagem = "Você não tem permissão para acessar esta página";
    $botao = "Ir para minha área";
    $urlBotao = "../controllers/professor.controller.php";
    $acaoBotao = "deslogar";
    exit();
}else{

$erro = $_SESSION['erro'] ?? '';
$sucesso = $_SESSION['sucesso'] ?? '';

unset($_SESSION['erro']);
unset($_SESSION['sucesso']);
}
if (isset($_POST["envio"]) && $_POST["envio"] == "true"){
    $resultado = validarLogin($bd,$_POST["professorLogin"]);
    if(!empty($resultado)){
        $_SESSION['erro'] = "O login inserido já está em uso!";
        header("Location: /admin/professor");
        exit();
    }
    $_SESSION['sucesso'] = 'Dados recebidos e válidos!';
    $professor = new Professor($_POST["professorNome"],$_POST["professorDataNascimento"],0,$_POST["professorLogin"],$_POST["professorSenha"]);
    cadastrarProfessor($bd,professor: $professor);
    header("Location: /admin/professor");
    exit();
}
require_once __DIR__ . '/../views/cadastroProfessor.view.php';

