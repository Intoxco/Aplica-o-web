<?php
session_start();
require_once "../entities/Professor.php";
require_once "../model/model-cadastro-horario.php";
require_once "../model/conexao.php";
require_once "view-cadastro-horario.php";
require_once "../entities/Aula.php";
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
    if($_POST['enviado'] == true){
        $_SESSION["idTurma"] = $_POST["turma"];
    }else if($_POST['enviar'] == true){
        cadastrar($bd,$_POST["horario"],$_POST["dia"],$_POST["professor"],$_POST["materia"]);

    }
}
function carregarTurmas($bd){
    $turmas = buscarTurmas($bd);     
    $i=1;    
    while($turma =  $turmas["$i"]){         
       echo "<option value=$i> ".$turma["ano"]."</option>";         
       $i++;     
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
    $periodo = buscarPeriodo($bd,$idTurma);
    switch($periodo){
        case 'matutino':
            $horarios = ["7:10","7:55","8:40","9:45","10:30","11:15","12:00"];
            break;
        case 'vespertino':
            $horarios = ["13:00","13:45","14:30","15:45","16:30","17:15","18:00"];
            break;
        case 'noturno':
            $horarios = ["18:45","19:45","20:30","21:15","22:00"];
            break;
        default:
            break;
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