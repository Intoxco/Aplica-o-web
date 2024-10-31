    <?php
$aluno="Pedro";
$periodo = "MTA";
$horarios=["manhã"=>["7:10","7:55","8:40","9:45","10:30","11:15","12:00"], 
            "tarde"=>["13:00","13:45","14:30","15:45","16:30","17:15","18:00"],
            "noite"=>"18:00","18:45","19:45","20:30","21:15","22:00"];
function imprimirTabela($horarios,$tipoTabela):string{
    if ($_POST["tipoTabela"] == "input"){
        return imprimirTabelaInput($horarios);
    }
    else{
        return imprimirTabelaComDados($horarios);
    }
}
function imprimirTabelaComDados($horarios):string{
    $i=0;
    $j=0;
    $tabela="<form action='aluno.php' method='post'>
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
    foreach($horarios["manhã"] as $horario){
        $tabela.= "<tr>";
        $tabela.= "<td>".$horario;
        for($i= 0;$i<6;$i++){
        $tabela .= "<td>".$_POST["$j$i"];
        }
        $tabela.= "</tr>";
        $j++;
    }
    $tabela.= "     </table>
              </div>
              <div id='botao'>
                <button type='submit' name='tipoTabela' value='input'>Editar horários</button>
              </div:
            </form>";
    return $tabela;
}
function imprimirTabelaInput($horarios):string{
    $i=0;
    $j=0;
    $tabela="<form method='post' 'action=alunos.php'>
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
    foreach($horarios["manhã"] as $horario){
        $tabela.= "<tr>";
        $tabela.= "<td>".$horario;
        for($i= 0;$i<6;$i++){
        $tabela .= "<td><input type= text name=".$j . $i .">";
        }
        $tabela.= "</tr>";
        $j++;
    }
    $tabela.= "         </table>
                    </div>
                    <div id='botao'>
                        <button type='submit' name='tipoTabela' value='dado'>Enviar</button>
                    </div>
                </form>";
    return $tabela;
}
require 'aluno.view.php';