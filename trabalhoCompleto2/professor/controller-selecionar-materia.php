<?php

require_once "../model/conexao.php";
require_once "../model/model-boletim.php";


function carregarMateria($bd){
    $materias = buscarMateria($bd);     
    $i=1;    
    while($materia =  $materias["$i"]){         
       echo "<option value=$i> ".$materia["nome"]."</option>";         
       $i++;     
   } 
}


require 'view-selecionar-materia.php';