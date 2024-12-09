<?php

require_once "../model/conexao.php";
require_once "../model/model-boletim.php";


function carregarTurmas($bd){
    $turmas = buscarTurmas($bd);     
    $i=1;    
    while($turma =  $turmas["$i"]){         
       echo "<option value=$i> ".$turma["ano"]."</option>";         
       $i++;
   } 
}


require 'view-selecionar-turma.php';
