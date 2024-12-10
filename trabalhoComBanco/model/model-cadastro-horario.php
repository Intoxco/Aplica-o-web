<?php
function buscarTurmas($bd): array {
    try {
        $query = $bd->prepare("SELECT * FROM turma");
        $query->execute();
        $retorno = []; // Inicializa o array vazio
        $i = 1;
        while ($turma = $query->fetch()) {
            $retorno["$i"] = $turma;
            $i++;
        }
        return $retorno;
    } catch (PDOException $e) {
        throw new Exception("Erro ao carregar: " . $e->getMessage());
    }
}

function buscarProfessores($bd): array {
    try {
        $query = $bd->prepare("SELECT * FROM professor");
        $query->execute();
        $professores = [];
        $i = 1;
        while ($professor = $query->fetch()) {
            $professores["$i"] = $professor;
            $i++;
        }
        return $professores;
    } catch (PDOException $e) {
        throw new Exception("Erro ao buscar: " . $e->getMessage());
    }
}

function buscarMaterias($bd): array {
    try {
        $query = $bd->prepare("SELECT * FROM materia");
        $query->execute();
        $materias = [];
        $i = 1;
        while ($materia = $query->fetch()) {
            $materias["$i"] = $materia;
            $i++;
        }
        return $materias;
    } catch (PDOException $e) {
        throw new Exception("Erro ao buscar: " . $e->getMessage());
    }
}

function buscarPeriodo($bd, $idTurma): string {
    try {
        $query = $bd->prepare("SELECT periodo FROM turma WHERE idTurma = :idTurma");
        $query->bindParam(":idTurma", $idTurma);
        $query->execute();
        $resultado = $query->fetch();
        if (!$resultado) {
            throw new Exception("Nenhum período encontrado para a turma $idTurma.");
        }
        return $resultado["periodo"];
    } catch (PDOException $e) {
        throw new Exception("Erro ao buscar: " . $e->getMessage());
    }
}

function buscarAula($bd, $diaSemana, $horarioInicio, $idTurma): array {
    try {
        $query = $bd->prepare("SELECT * FROM aula WHERE diaSemana = :diaSemana AND horarioInicio = :horarioInicio AND idTurma = :idTurma");
        $query->bindParam(":diaSemana", $diaSemana);
        $query->bindParam(":horarioInicio", $horarioInicio);
        $query->bindParam(":idTurma", $idTurma);
        $query->execute();
        $aula = $query->fetch();

        if (!$aula) {
            return ["professor" => "Desconhecido", "materia" => "Sem informação"]; // Valores padrão
        }

        $query = $bd->prepare("SELECT nome FROM professor WHERE idUsuario = :idUsuario");
        $query->bindParam(":idUsuario", $aula["idUsuario"]);
        $query->execute();
        $professor = $query->fetch();
        $resultado["professor"] = $professor ? $professor["nome"] : "Desconhecido";

        $query = $bd->prepare("SELECT nome FROM materia WHERE idMateria = :idMateria");
        $query->bindParam(":idMateria", $aula["idMateria"]);
        $query->execute();
        $materia = $query->fetch();
        $resultado["materia"] = $materia ? $materia["nome"] : "Sem informação";

        return $resultado;
    } catch (PDOException $e) {
        throw new Exception("Erro ao buscar: " . $e->getMessage());
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