<?php
function autenticar($login,$senha,$bd):mixed{
    try{
        $query = $bd->prepare("SELECT * FROM usuario WHERE login = :login");
        $query->bindParam(':login', $login);
        $query->execute();
        $usuario = $query->fetch();
        if(!$usuario){
            return ['erro' =>"Usuário não encontrado"];
        }
    if($senha == $usuario['senha']){
        $role= getRole($usuario['idUsuario'],$bd);
        $usuario['role'] = $role;
        return $usuario;
    }else{
        return ['erro' => 'Senha incorreta.'];
    }
    }catch (PDOException $e) {
        throw new Exception("Erro ao autenticar: " . $e->getMessage());
    }
}
function getRole($idUsuario,$bd):string {
    try{
        $query = $bd->prepare("SELECT * FROM admin WHERE idUsuario = :idUsuario");
        $query->bindParam(':idUsuario', $idUsuario);
        $query->execute();
        if($query->fetch())
            return 'admin';
        $query = $bd->prepare("SELECT * FROM professor WHERE idUsuario = :idUsuario");
        $query->bindParam(':idUsuario', $idUsuario);
        $query->execute();
        if($query->fetch())
            return 'professor';
        $query = $bd->prepare("SELECT * FROM aluno WHERE idUsuario = :idUsuario");
        $query->bindParam(':idUsuario', $idUsuario);
        $query->execute();
        if($query->fetch())
            return 'aluno';
        return "unknown";
    } catch (PDOException $e) {
        throw new Exception("Erro ao verificar função do usuário: " . $e->getMessage());
    }
}