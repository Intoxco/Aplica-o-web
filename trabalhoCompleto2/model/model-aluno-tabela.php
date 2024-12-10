<?php

function buscarTurma($bd,$idUsuario):int{
    try{
        $query = $bd->prepare("SELECT idTurma FROM aluno WHERE idUsuario = :idUsuario");
        $query->bindParam(":idUsuario",$idUsuario);
        $query->execute();
        return $query->fetch()["idTurma"];
    }catch(PDOException $e){
        throw new Exception("Erro ao buscar: " . $e->getMessage());
    }
}
function buscarPeriodo($bd,$idTurma):string{
    try{
        $query = $bd->prepare("SELECT periodo FROM turma WHERE idTurma = :idTurma");
        $query->bindParam(":idTurma",$idTurma);
        $query->execute();
        return $query->fetch()["periodo"];
    }catch(PDOException $e){
        throw new Exception(message: "Erro ao buscar: " . $e->getMessage());
    }
}
function buscarAula($bd,$diaSemana,$horarioInicio,$idTurma):array{
    try{
        $query = $bd->prepare("SELECT * FROM aula WHERE diaSemana = :diaSemana AND horarioInicio = :horarioInicio AND idTurma = :idTurma");
        $query->bindParam(":diaSemana",$diaSemana);
        $query->bindParam(":horarioInicio",$horarioInicio);
        $query->bindParam(":idTurma",$idTurma);
        $query->execute();
        $aula = $query->fetch();

        $query = $bd->prepare("SELECT nome FROM professor WHERE idUsuario = :idUsuario");
        $query->bindParam(":idUsuario",$aula["idUsuario"]);
        $query->execute();
        $resultado["professor"] = $query->fetch()["nome"];

        $query = $bd->prepare("SELECT nome FROM materia WHERE idMateria = :idMateria");
        $query->bindParam(":idMateria",$aula["idMateria"]);
        $query->execute();
        $resultado["materia"] = $query->fetch()["nome"];
        return $resultado;
    }catch(PDOException $e){
        throw new Exception(message: "Erro ao buscar: " . $e->getMessage());
    }
}