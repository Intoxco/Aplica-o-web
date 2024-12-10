<?php
require_once __DIR__ . '/../model/conexao.php';
require_once __DIR__ . '/../model/model-aluno-horario.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ./');
    exit();
}

if ($_SESSION["funcao"] == 'Admin') {
    $mensagem = "Administradores não devem acessar esta página.";

} else if($_SESSION["funcao"] == 'Professor'){
    $mensagem = "Professores não devem acessar esta página";
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
$horarios = buscarHorarios($bd,buscarTurma($bd,$_SESSION["idUsuario"]));
$dias = ["Segunda-Feira","Terca-Feira","Quarta-Feira","Quinta-Feira","Sexta-Feira","Sabado"];
function carregarAula($bd,$horarioInicio,$diaSemana,$idTurma){
    $aula = buscarAula($bd,$diaSemana,$horarioInicio,$idTurma);
    echo strtoupper(substr($aula["materia"],0,3)) ." ".substr($aula["professor"],0,3);
}
require_once __DIR__ . '/../views/alunoHorario.view.php';
