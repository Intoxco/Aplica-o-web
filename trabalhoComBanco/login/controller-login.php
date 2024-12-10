<?php
session_start();
require('view-login.php');
require('../model/model-login.php');
require('../model/conexao.php');


$error = $_SESSION['error'] ?? false;
$login = trim($_POST['usuario'] ?? ''); 
$senha = trim($_POST['senha'] ?? '');   
if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    if (!empty($login) && !empty($senha)) {
        $dadosUsuario = autenticar($login, $senha,$bd);
        if (isset($dadosUsuario['erro'])) {
            $_SESSION['error'] = $dadosUsuario['erro'];
        } else {
            
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = $login;
            $_SESSION['idUsuario'] = $dadosUsuario['idUsuario']; 
            $_SESSION['funcao'] = $dadosUsuario['role'];
            switch ($dadosUsuario['role']) {
                case 'professor':
                    header('Location: ../professor/controller-professor.php');
                    break;
                case 'aluno':
                    header('Location: ../aluno/controller-aluno-boletim.php');
                    break;
                case 'admin':
                    header('Location: ../admin/controller-cadastro-aluno.php');
                    echo "a";
                    exit();
                    default:
                        $_SESSION['error'] = 'Função do usuário desconhecida.';
                        header('Location:controller-login.php');
                        exit();
                }
                
            }
        } else {
            $_SESSION['error'] = 'Preencha todos os campos.';
        }
    }else{
    if($_SESSION[$usuario]["funcao"] == "professor")
        header('Location: ../professor/controller-professor.php');
    if($_SESSION[$usuario]["funcao"] == "aluno")
        header('Location: ../aluno/controller-aluno.php');
    else
        header('Location:../admin/controller-cadastro-aluno.php');
}
    
    if ($error) {
        unset($_SESSION['error']);
    }
        