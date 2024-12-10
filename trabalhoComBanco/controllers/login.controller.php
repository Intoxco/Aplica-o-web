<?php


session_start();
require(__DIR__ . '/../views/login.view.php');
require(__DIR__ . '/../model/model-login.php');
require(__DIR__ . '/../model/conexao.php');



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
                    header('Location: /professor');
                    break;
                case 'aluno':
                    header('Location: /aluno/boletim');
                    break;
                case 'admin':
                    header('Location: /admin/aluno');
                    exit();
                    default:
                        $_SESSION['error'] = 'Função do usuário desconhecida.';
                        header('Location: /');
                        exit();
                }
                
            }
        } else {
            $_SESSION['error'] = 'Preencha todos os campos.';
        }
    }else{
        if($_SESSION['usuario'] && $_SESSION['funcao'] == "professor") {
            header('Location: /professor');
        }
        if($_SESSION['usuario'] && $_SESSION['funcao'] == "aluno") {
            header('Location: /aluno/boletim');
        } else {
            header('Location: /admin/aluno');
        }
        
}
    
    if ($error) {
        unset($_SESSION['error']);
    }
