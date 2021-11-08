<?php

// exemplo de uso
/*$artista = new Artista("senacprojeto", "localhost", "root", '');
$artitas = $artista->buscarDados();
var_dump($artista);*/



class Artista {
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
    public function buscarDados() {
        $res = array();
        $cmd = $this->pdo->query("SELECT * FROM artista ORDER BY nome ASC");
        $res = $cmd->fetchALL(PDO::FETCH_ASSOC);
        return $res;
    }
    public function cadastrarArtista($nome, $telefone, $email){
       $cmd = $this->pdo->prepare("SELECT id FROM artista WHERE email = :e");
       $cmd->bindValue(":e", $email);
       $cmd->execute();
       if ($cmd->rowCount() > 0){
         return false;
       } else {
        $cmd = $this->pdo->prepare("INSERT INTO artista (nome, telefone, email) VALUES (:n, :t, :e)");
        $cmd->bindValue(":n",$nome);
        $cmd->bindValue(":t",$telefone);
        $cmd->bindValue(":e",$email);
        $cmd->execute();
        return true;
       } 
    }
    public function excluirArtista($id){
        $cmd = $this->pdo->prepare("DELETE FROM artista WHERE id = :id");
        $cmd->bindValue(":id",$id);
        $cmd->execute();
    }

    public function buscarDadosArtista($id){
        $res = array();
        $cmd = $this->pdo->prepare("SELECT FROM artista WHERE id = :id");
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;


    }

    public function atualizarDados($id, $nome, $telefone, $email){

        $cmd = $this->pdo->prepare("UPDATE artista SET nome = :n, telefone = :t, email = :e WHERE id = :id");
        $cmd->bindValue(":n",$nome);
        $cmd->bindValue(":t",$telefone);
        $cmd->bindValue(":e",$email);
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        return true;

    }
}
