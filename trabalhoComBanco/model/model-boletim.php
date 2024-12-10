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

function buscarAlunosPorTurma($bd, $idTurma): ?array {
    try {
        $query = $bd->prepare("SELECT * FROM aluno WHERE idTurma = :idTurma");
        $query->bindParam(':idTurma', $idTurma, PDO::PARAM_INT);
        $query->execute();
        
        $i = 1;
        $retorno = [];
        while ($aluno = $query->fetch()) {
            $retorno["$i"] = $aluno;
            $i++;
        }
        return !empty($retorno) ? $retorno : null;
    } catch (PDOException $e) {
        throw new Exception("Erro ao carregar alunos: " . $e->getMessage());
    }
}

function buscarNotasDoAluno($bd, $idAluno): array {
    try {
        $query = $bd->prepare("SELECT b.nota, m.idMateria 
                               FROM boletim b
                               JOIN materia m ON b.idMateria = m.idMateria
                               WHERE b.idUsuario = :idAluno");
        $query->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
        $query->execute();

        $notas = $query->fetchAll(PDO::FETCH_ASSOC);

        // Organize as notas em um array associativo para fácil acesso
        $notasAssociativas = [];
        foreach ($notas as $nota) {
            $notasAssociativas[$nota['idMateria']] = $nota['nota'];
        }

        return $notasAssociativas;
    } catch (PDOException $e) {
        throw new Exception("Erro ao carregar as notas: " . $e->getMessage());
    }
}



