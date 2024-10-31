<?php
session_start();

$nomeAluno = trim($_POST['nomealuno'] ?? '');
$nota1 = trim($_POST['nota1'] ?? '');
$nota2 = trim($_POST['nota2'] ?? '');
$nota3 = trim($_POST['nota3'] ?? '');

function validarNota($nota) {
    return is_numeric($nota) && $nota >= 0 && $nota <= 10;
}

if ($nomeAluno === '' || $nota1 === '' || $nota2 === '' || $nota3 === '') {
    $_SESSION['erro'] = 'Preencha todos os campos';
    header('Location: index-professor.php');
    exit();
}

if (!validarNota($nota1) || !validarNota($nota2) || !validarNota($nota3)) {
    $_SESSION['erro'] = 'As notas devem ser numéricas entre 0 e 10';
    header('Location: index-professor.php');
    exit();
}

$_SESSION['nomealuno'] = $nomeAluno;
$_SESSION['nota1'] = $nota1;
$_SESSION['nota2'] = $nota2;
$_SESSION['nota3'] = $nota3;

$_SESSION['sucesso'] = 'Dados recebidos e válidos!';
header('Location: aluno.php');
exit();
