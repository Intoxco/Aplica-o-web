<?php
require_once "../model/conexao.php";
require_once "../model/model-boletim.php";

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login/controller-login.php');
    exit();
}

if ($_SESSION["funcao"] == 'Admin') {
    $mensagem = "Administradores não devem acessar esta página.";

} else if($_SESSION["funcao"] == 'Professor'){
    $mensagem = "Professores não devem acessar esta página";
}

if (isset($_SESSION['idUsuario'])) {
    $usuarioId = $_SESSION['idUsuario'];
}

$materias = buscarMateria($bd);

$notas = buscarNotasDoAluno($bd, $usuarioId);


require 'view-aluno-boletim.php';
