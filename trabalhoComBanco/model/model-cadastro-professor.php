<?php
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
    function cadastrarProfessor($bd,$professor){
        try{
            $query= $bd->prepare("INSERT INTO usuario(login,senha) values(:login,:senha)");
            $query->bindParam(":login",$professor->getLogin());
            $query->bindParam(":senha",$professor->getSenha());
            $query->execute();
            $query = $bd->prepare("SELECT idUsuario FROM usuario WHERE login = :login");
            $query->bindParam(":login",$professor->getLogin());
            $query->execute();
            $professor->setIdUsuario($query->fetch()["idUsuario"]);
            $query= $bd->prepare("INSERT INTO professor(idUsuario,dataNascimento,nome) VALUES(:idUsuario,:dataNascimento,:nome)");
            $query->bindParam(":idUsuario",$professor->getIdUsuario());
            $query->bindParam(":dataNascimento",$professor->getDataNascimento());
            $query->bindParam(":nome",$professor->getNome());
            $query->execute();
        }catch(PDOException $e){
            throw new Exception("Erro ao cadastrar o professor: " . $e->getMessage());
        }
    }