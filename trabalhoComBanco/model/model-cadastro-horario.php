<?php
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
function buscarProfessores($bd):array{
    try{
        $query= $bd->prepare("SELECT * FROM professor");
        $query->execute();
        $i=1;
        while($professor = $query->fetch()){
            $professores["$i"] = $professor;
        $i++;
        }
        return $professores;
    }catch (PDOException $e){
        throw new Exception(message: "Erro ao buscar: " . $e->getMessage());
    }
}
function buscarMaterias($bd):array{
    try{
        $query = $bd->prepare("SELECT * FROM materia");
        $query->execute();
        $i=1;
        while($materia = $query->fetch()){
            $materias["$i"] = $materia;
            $i++;
        }
        return $materias;
    }catch (PDOException $e){
        throw new Exception(message: "Erro ao buscar: " . $e->getMessage());
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

    
function cadastrarAula($bd,$horarioInicio,$diaSemana,$idMateria,$idTurma,$idUsuario){
    try{
        $query = $bd->prepare("INSERT INTO aula(horarioInicio,diaSemana,idMateria,idTurma,idUsuario) VALUES(:horarioInicio,:diaSemana,:idMateria,:idTurma,:idUsuario)");
        $query->bindParam(":horarioInicio",$horarioInicio);
        $query->bindParam(":diaSemana",$diaSemana);
        $query->bindParam(":idMateria",$idMateria);
        $query->bindParam(":idTurma",$idTurma);
        $query->bindParam(":idUsuario",$idUsuario);
        $query->execute();
    }catch(PDOException $e){
        throw new Exception("Erro ao cadastrar aula:" . $e->getMessage());
    }
}