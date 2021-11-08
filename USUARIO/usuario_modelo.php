<?php

class Usuario {
    private $pdo;

    //Conexao bd
    public function __construct($dbdname, $host, $user, $senha){

        try {
            $this->pdo = new PDO('mysql:dbname='. $dbdname . ";host=" . $host, $user, $senha);
        } catch ( PDOException $e) {
            echo "Erro com banco de dados: " . $e->getMessage();
        } catch (Exception $e){   
            echo "Erro generico: " . $e->getMessage();       
        }
    }

    public function cadastrarUsuario($nome, $telefone, $email, $senha){
        $cmd = $this->pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e");
        $cmd->bindValue(":e", $email);
        $cmd->execute();
        if ($cmd->rowCount() > 0){
          return false;
        } else {
         $cmd = $this->pdo->prepare("INSERT INTO usuario (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
         $cmd->bindValue(":n", $nome);
         $cmd->bindValue(":t", $telefone);
         $cmd->bindValue(":e", $email);
         $cmd->bindValue(":s", md5($senha));
         $cmd->execute();
         return true;
        } 
    }
  public function logar( $email, $senha){
    $cmd = $this->pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e AND senha = :s");
    $cmd->bindValue(":e", $email);
    $cmd->bindValue(":s", md5($senha));
    $cmd->execute();
    if ($cmd->rowCount() > 0){

        $dado = $cmd->fetch();
        session_start();
        $_SESSION['id_usuario'] = $dado = ['id_usuario'];
        return true;
      
    }else{

        return false;

    }
  }
}

?>