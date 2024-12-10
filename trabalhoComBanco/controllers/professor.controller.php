<?php

require_once __DIR__ . '/../model/conexao.php';
require_once __DIR__ . '/../model/model-boletim.php';

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ../controllers/login.controller.php');
    exit();
}

if ($_SESSION["funcao"] == "aluno") {
    $mensagem = "Você não tem permissão para acessar esta página.";
    $botao = "Ir para minha área";
    $urlBotao = "/aluno/boletim";
    $acaoBotao = "deslogar";
} else if($_SESSION['funcao'] === 'Admin'){
    $mensagem = "Administradores não devem utilizar esta página";
    $botao = "Ir para minha área";
    $urlBotao = "/admin/aluno";
    $acaoBotao = "deslogar";
}else{
    $erro = $_SESSION['erro'] ?? '';
    $sucesso = $_SESSION['sucesso'] ?? '';

    unset($_SESSION['erro']);
    unset($_SESSION['sucesso']);
}

if (isset($_POST['envio']) && $_POST['envio'] === 'true') {
    $idMateria = intval($_POST['alunoMateria']);  
    $idAluno = intval($_POST['aluno']);           
    $nota = floatval($_POST['nota']);             

    try {
        // Inserir a nota no banco com o ID do aluno e da matéria
        $query = $bd->prepare("INSERT INTO boletim (idMateria, idUsuario, nota) VALUES (:idMateria, :idUsuario, :nota)");
        $query->bindParam(':idMateria', $idMateria, PDO::PARAM_INT);  
        $query->bindParam(':idUsuario', $idAluno, PDO::PARAM_INT);     
        $query->bindParam(':nota', $nota);

        if ($query->execute()) {
            echo "Nota inserida com sucesso!";
        } else {
            echo "Erro: Não foi possível inserir a nota.";
        }
    } catch (PDOException $e) {
        echo "Erro ao inserir nota: " . $e->getMessage();
    }
}
$alunos = [];
if (isset($_POST['alunoTurma']) && !empty($_POST['alunoTurma'])) {
    $idTurma = intval($_POST['alunoTurma']);  
    $alunos = buscarAlunosPorTurma($bd, $idTurma); 
}

function carregarTurmas($bd) {
    $turmas = buscarTurmas($bd);     
    foreach ($turmas as $turma) {
        echo "<option value='" . $turma["idTurma"] . "'>" . $turma["ano"] . "</option>";         
    }
}

function carregarMateria($bd){
    $materias = buscarMateria($bd);     
    foreach ($materias as $materia) {         
        echo "<option value='" . $materia['idMateria'] . "'>" . $materia["nome"] . "</option>";         
    } 
}

require __DIR__ . '/../views/professor.view.php';