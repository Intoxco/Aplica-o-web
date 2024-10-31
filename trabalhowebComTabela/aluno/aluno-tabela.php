<?php
$periodo = ["M","T","N"];
$horarios=["manhã"=>["7:10","7:55","8:40","9:45","10:30","11:15","12:00"], 
            "tarde"=>["13:00","13:45","14:30","15:45","16:30","17:15","18:00"],
            "noite"=>["18:00","18:45","19:45","20:30","21:15","22:00"]];
function imprimirTabela($horarios,$tipoTabela):string{
    if ($_GET["tipoTabela"] == "input"){
        return imprimirTabelaInput($horarios);
    }
    else{
        return imprimirTabelaComDados($horarios);
    }
}
function imprimirTabelaComDados($horarios):string{
    $i=0;
    $j=0;
    $tabela="<form action='aluno-tabela.php' method='GET'>
                <div id='tabela'>
                    <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Segunda-Feira</th>
                            <th>Terça-feira</th>
                            <th>Quarta-feira</th>
                            <th>Quinta-feira</th>
                            <th>Sexta-feira</th>
                            <th>Sábado</th>
                        </tr>
                    </thead>";
    $tabela = imprimirPeriodo($tabela,$horarios,"manhã",$i,0);
    $tabela = imprimirPeriodo($tabela,$horarios,"tarde",$i,7);
    $tabela = imprimirPeriodo($tabela,$horarios,"noite",$i,14);
    $tabela.= "     </table>
              </div>
              <div id='botao'>
                <button type='submit' name='tipoTabela' value='input'>Editar horários</button>
              </div>
            </form>";
    return $tabela;
}

function imprimirTabelaInput($horarios):string{
    $i=0;
    $j=0;
    $tabela="<form method='GET' action='aluno-tabela.php'>
                <div id='tabela'>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Segunda-Feira</th>
                            <th>Terça-feira</th>
                            <th>Quarta-feira</th>
                            <th>Quinta-feira</th>
                            <th>Sexta-feira</th>
                            <th>Sábado</th>
                    </thead>";
                    $tabela = imprimirPeriodoInput($tabela,$horarios,"manhã",$i,0);
                    $tabela = imprimirPeriodoInput($tabela,$horarios,"tarde",$i,7);
                    $tabela = imprimirPeriodoInput($tabela,$horarios,"noite",$i,14);
    $tabela.= "         </table>
                    </div>
                    <div id='botao'>
                        <button type='submit' name='tipoTabela' value='dado'>Enviar horários</button>
                    </div>
                </form>";
    return $tabela;
}
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
        $tabela .= "<td>".$_GET["$j$i"];
        }
        $tabela.= "</tr>";
        $j++;
    }
    return $tabela;
}
require 'aluno-tabela.view.php';