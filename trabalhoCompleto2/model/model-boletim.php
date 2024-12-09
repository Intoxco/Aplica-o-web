<?php

function buscarMateria($bd):array{
    try{
        $query = $bd->prepare("SELECT * FROM materia");
        $query->execute();
        $i=1;
        while($materia= $query->fetch()){
            $retornomateria["$i"] = $materia;
            $i++;
        }
        return $retornomateria;
    }catch (PDOException $e){
        throw new Exception("Erro ao carregar: " . $e->getMessage());
    }
}

function buscarTurmas($bd):array{
    try{
        $query = $bd->prepare("SELECT * FROM turma");
        $query->execute();
        $i=1;
        while($turma= $query->fetch()){
            $retorno["$i"] = $turma;
            $i++;
        }
        return $retorno;
    }catch (PDOException $e){
        throw new Exception("Erro ao carregar: " . $e->getMessage());
    }
}

function buscarAluno($bd):array{
    try{
        $query = $bd->prepare("SELECT * FROM aluno WHERE ");
        $query->execute();
        $i=1;
        while($aluno= $query->fetch()){
            $retornoaluno["$i"] = $aluno;
            $i++;
        }
        return $retornoaluno;
    }catch (PDOException $e){
        throw new Exception("Erro ao carregar: " . $e->getMessage());
    }

}




