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
function validarLogin($bd,$login):mixed{
    try{
        $query = $bd->prepare("SELECT * FROM usuario WHERE login =:login ");
        $query->bindParam(":login",$login);
        $query->execute();
        $resultado = $query->fetch();
        return $resultado;
    }catch(PDOException $e){
        throw new Exception("Erro ao validar login: " . $e->getMessage());
    }
}
    function cadastrarAluno($bd,$aluno){
        try{
            $query= $bd->prepare("INSERT INTO usuario(login,senha) values(:login,:senha)");
            $query->bindParam(":login",$aluno->getLogin());
            $query->bindParam(":senha",$aluno->getSenha());
            $query->execute();
            $query = $bd->prepare("SELECT idUsuario FROM usuario WHERE login = :login");
            $query->bindParam(":login",$aluno->getLogin());
            $query->execute();
            $aluno->setIdUsuario($query->fetch()["idUsuario"]);
            $query= $bd->prepare("INSERT INTO aluno(idUsuario,idTurma,dataNascimento,nome,nomeResponsavel) VALUES(:idUsuario,:idTurma,:dataNascimento,:nome,:nomeResponsavel)");
            $query->bindParam(":idUsuario",$aluno->getIdUsuario());
            $query->bindParam(":idTurma",$aluno->getTurma());
            $query->bindParam(":dataNascimento",$aluno->getDataNascimento());
            $query->bindParam(":nome",$aluno->getNome());
            $query->bindParam(":nomeResponsavel",$aluno->getNomeResponsavel());
            $query->execute();
        }catch(PDOException $e){
            throw new Exception("Erro ao cadastrar o aluno: " . $e->getMessage());
        }
    }