<?php
session_start();
require_once __DIR__ . "/../entities/Professor.php";
require_once __DIR__ . "/../model/model-cadastro-horario.php";
require_once __DIR__ . "/../model/conexao.php";
require_once __DIR__ . "/../views/cadastroHorario.view.php";
require_once __DIR__ . "/../entities/Aula.php";

if (!isset($_SESSION['usuario'])) {
    header('Location: ../login/controller-login.php');
    exit();
}

if ($_SESSION["funcao"] == 'aluno') {
    $mensagem = "Você não tem permissão para acessar esta página.";
    $botao = "Ir para minha área";
    $urlBotao = "../aluno/view-aluno.php";
    $acaoBotao = "deslogar";
} else if($_SESSION["funcao"] == "professor"){
    $mensagem = "Você não tem permissão para acessar esta página";
    $botao = "Ir para minha área";
    $urlBotao = "../professor/index-professor.php";
    $acaoBotao = "deslogar";
}else{
    if (isset($_POST['enviado']) && $_POST['enviado'] === 'true' && isset($_POST["turma"])) {
        $_SESSION["idTurma"] = $_POST["turma"];
    } else if (isset($_POST['enviar']) && $_POST['enviar'] === 'true' 
               && isset($_POST["horario"], $_POST["dia"], $_POST["professor"], $_POST["materia"])) {
        cadastrar($bd, $_POST["horario"], $_POST["dia"], $_POST["professor"], $_POST["materia"]);
    }
}
function carregarTurmas($bd){
    $turmas = buscarTurmas($bd);
    if ($turmas) {
        foreach ($turmas as $key => $turma) {
            echo "<option value={$key}> " . htmlspecialchars($turma["ano"]) . "</option>";
        }
    } else {
        echo "<option disabled>Nenhuma turma encontrada</option>";
    }
}
function carregarProfessores($bd){
    $professores = buscarProfessores($bd);
    foreach($professores as $professor){
        echo "<option value=".$professor['idUsuario'].">".$professor['nome']."</option>";   
    }
}
function carregarMaterias($bd){
    $materias = buscarMaterias($bd);
    foreach($materias as $materia){
        echo "<option value=".$materia["idMateria"].">".$materia["nome"]."</option>";
    }
}
function carregarHorarios($bd,$idTurma){
    $horarios = buscarHorarios($bd,$idTurma);
    foreach($horarios as $horario){
        echo "<option value=".$horario.">".$horario."</option>";
    }  
}
function buscarHorarios($bd,$idTurma):array{
    $periodo = buscarPeriodo($bd, $idTurma);
    if (!$periodo) {
    return []; 
    }

    switch ($periodo) {
        case 'matutino':
            $horarios = ["7:10", "7:55", "8:40", "9:45", "10:30", "11:15", "12:00"];
            break;
        case 'vespertino':
            $horarios = ["13:00", "13:45", "14:30", "15:45", "16:30", "17:15", "18:00"];
            break;
        case 'noturno':
            $horarios = ["18:45", "19:45", "20:30", "21:15", "22:00"];
            break;
        default:
            return []; 
    }
    return $horarios;
}
function carregarAula($bd,$horarioInicio,$diaSemana,$idTurma){
    $aula = buscarAula($bd,$diaSemana,$horarioInicio,$idTurma);
    echo strtoupper(substr($aula["materia"],0,3)) ." ".substr($aula["professor"],0,3);
}
function cadastrar($bd,$horarioInicio,$diaSemana,$idProfessor,$idMateria){
    cadastrarAula($bd,$horarioInicio,$diaSemana,$idMateria,$_SESSION["idTurma"],$idProfessor);
}