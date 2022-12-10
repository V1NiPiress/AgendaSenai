<?php

require_once 'conexao.class.php';

class Usuarios {
     private $con; //variavel que recebe a conexao

     private $id;
     private $nome;
     private $email;
     private $senha;
     private $permissoes; //ADD, EDIT, DELETE, SUPER(ACESSO A GESTAO DO USUARIO)
    
     public function __construct(){
        $this ->con = new Conexao();

     }

/*
aqui deve ser criado o CRUD para Usuarios  
-adicionar
-listar
-buscar
-editar
-excluir
-existe_email
*/

  public function adicionar($nome, $email, $senha, $permissoes){
    $emailExistente = $this->existeEmail($email);
    if(count($emailExistente) == 0){
        try{
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
            $this->permissoes = $permissoes;
            $sql = $this->con->conectar()->prepare("INSERT INTO usuarios(nome, email, senha, permissoes) VALUES(:nome, :email, :senha, :permissoes)");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->bindValue(":permissoes", $permissoes);
            $sql->execute();
            return TRUE;
        }catch(PDOException $ex){
            return 'ERRO: '.$ex->getMenssage();
        }
    }else{
        return FALSE;
    }
  }

  public function listar(){
    try{
        $sql = $this->con->conectar()->prepare("SELECT id, nome, email, senha, permissoes FROM usuarios");
        $sql->execute();
        return $sql->fetchAll();
    }catch(PDOException $ex){
        return 'ERRO: '.$ex->getMessage();
    }
}

  public function buscar($id){
    try{
        $sql = $this->con->conectar()->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetch();
        }else{
            return array();
        }
    }catch(PDOException $ex){
        echo "ERRO: ".$ex->getMessage();
    }
}

 public function editar($nome, $email, $senha, $permissoes, $id){
    $emailExistente = $this->existeEmail($email);
    if(count($emailExistente) > 0 && $emailExistente['id'] != $id){
        return FALSE;
    }else{
        try{
            $sql = $this->con->conectar()->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, permissoes = :permissoes WHERE id = :id");
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->bindValue(':permissoes', $permissoes);
            $sql->bindValue(':id', $id);
            $sql->execute();
            return TRUE;
        }catch(PDOException $ex){
            echo "ERRO: ".$ex->getMessage();
        }
    }

}

 public function excluir($id){
    $sql = $this->con->conectar()->prepare("DELETE FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
   $sql->execute();
 }  
  
 private function existeEmail($email){
    $sql = $this->con->conectar()->prepare("SELECT id FROM usuarios WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() > 0){
        $array = $sql->fetch();
    }else{
        $array = array();
    }
    return $array;
    }

//metodos referentes ao login

public function fazerLogin($email, $senha){

$sql = $this->con->conectar()->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
$sql ->bindValue (":email", $email);
$sql ->bindValue (":senha", $senha);
$sql ->execute();

     if($sql->rowCount() > 0){
        $sql = $sql->fetch();

         $_SESSION['logado'] = $sql['id'];
      return TRUE;

        }
        return FALSE;
    }
    public function setUsuario($id){
        $this->id = $id;
        $sql = $this->con->conectar()->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();   

        if($sql->rowCount() > 0 ){
            $sql = $sql->fetch();
            $this->permissoes = explode(',',$sql['permissoes']);
        }
    }
    public function getPermissoes(){
        return $this->permissoes;
    }
    public function temPermissoes($p){
        if(in_array($p, $this->permissoes)){
            return TRUE;
        }else {
            return FALSE;
        }    
    }
}
