<?php 
session_start();
require_once "../model/conexao.php";
require_once "../model/model-cadastro-aluno.php";
require_once "../entities/Aluno.php";
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login/controller-login.php');
    exit();
}

if ($_SESSION["funcao"] == 'aluno') {
    $mensagem = "Você não tem permissão para acessar esta página.";
    $botao = "Ir para minha área";
    $urlBotao = "../aluno/controller-aluno-boletim.php";
    $acaoBotao = "deslogar";
} else if($_SESSION["funcao"] == "professor"){
    $mensagem = "Você não tem permissão para acessar esta página";
    $botao = "Ir para minha área";
    $urlBotao = "../professor/controller-professor.php";
    $acaoBotao = "deslogar";
}else{
$erro = $_SESSION['erro'] ?? '';
$sucesso = $_SESSION['sucesso'] ?? '';

unset($_SESSION['erro']);
unset($_SESSION['sucesso']);
}
if ($_POST["envio"]== "true"){
    $resultado = validarLogin($bd,$_POST["alunoLogin"]);
    if(!empty($resultado)){
        $_SESSION['erro'] = "O login inserido já está em uso!";
        header("Location: controller-cadastro-aluno.php");
        exit();
    }
    $_SESSION['sucesso'] = 'Dados recebidos e válidos!';
    $aluno = new Aluno($_POST["alunoLogin"],$_POST["alunoSenha"],0,$_POST["alunoResponsavel"],$_POST["alunoDataNascimento"],$_POST["alunoNome"],$_POST["alunoTurma"]);
    cadastrarAluno($bd,$aluno);
    header("Location: controller-cadastro-aluno.php");
    exit(); 
}
function carregarTurmas($bd){
         $turmas = buscarTurmas($bd);     
         $i=1;    
         while($turma =  $turmas["$i"]){         
            echo "<option value=$i> ".$turma["ano"]."</option>";         
            $i++;     
        } 
}
require "view-cadastro-aluno.php";
