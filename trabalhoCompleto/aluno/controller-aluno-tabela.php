<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login/login.php');
    exit();
}

if ($_SESSION["usuario"] == 'Admin') {
    $mensagem = "Administradores não devem acessar esta página.";

} else if($_SESSION[$_SESSION["usuario"]]["funcao"] == 'Professor'){
    $mensagem = "Professores não devem acessar esta página";
}
$tipoTabela = $_POST["tipoTabela"];
$periodo = ["M","T","N"];
$horarios=["manhã"=>["7:10","7:55","8:40","9:45","10:30","11:15","12:00"], 
            "tarde"=>["13:00","13:45","14:30","15:45","16:30","17:15","18:00"],
            "noite"=>["18:45","19:45","20:30","21:15","22:00"]];

function imprimirPeriodoInput($tabela,$horarios,$periodo,$i,$j):string{
    foreach($horarios[$periodo] as $horario){
        $tabela.= "<tr>";
        $tabela.= "<td>".$horario;
        for($i= 0;$i<6;$i++){
            $tabela .= "<td><input type= 'text' name=".$j . $i   .">";
        }
            $tabela.= "</tr>";
        $j++;
    }
    return $tabela;
}
function imprimirPeriodo($tabela,$horarios,$periodo,$i,$j):string{
    foreach($horarios[$periodo] as $horario){
        $tabela.= "<tr>";
        $tabela.= "<td>".$horario;
        for($i= 0;$i<6;$i++){
        $tabela .= "<td>".$_SESSION[$_SESSION["usuario"]]["tabela"]["$j$i"];
        }
        $tabela.= "</tr>";
        $j++;
    }
    return $tabela;
}

function salvarDados($i,$j):void{
    for($j=0;$j<19;$j++){
        for($i= 0;$i<6;$i++){
            if($_POST["$j$i"] != NULL)
                $_SESSION[$_SESSION["usuario"]]["tabela"]["$j$i"] = $_POST["$j$i"];
        }
    }
}
require 'view-aluno-tabela.view.php';