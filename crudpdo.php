<?php

//conexâo ao banco----------------->

try {

$pdo = new PDO("mysql:dbname=senacprojeto;host=localhost","root","");

} 
catch ( PDOException $e) {

echo "Erro com banco de dados: " . $e->getMessage();

} 
catch (Exception $e){

 echo "Erro generico: " . $e->getMessage();

}


//INSERT------------------>

/*$res = $pdo->prepare("INSERT INTO artista (nome, telefone, email) VALUES (:n, :t, :e )");

$res->bindValue(":n","Roberta");
$res->bindValue(":t","000000");
$res->bindValue(":e","rb@gmail.com");
$res->execute();*/


//DELETE

/*$cmd = $pdo->prepare("DELETE FROM artista WHERE id = :id");
$id = 2;
$cmd->bindValue(":id",$id);
$cmd->execute();*/


//UPDATE --------------->


/*$cmd = $pdo->prepare("UPDATE artista SET email = :e WHERE id = :id");
$cmd->bindValue(":e","roberta@gmail.com");
$cmd->bindValue(":id",4);
$cmd->execute();*/



//SELECT----------------->


/*$cmd = $pdo->prepare("SELECT * FROM artista  WHERE id = :id");
$cmd->bindValue(":id",4);
$cmd->execute();

$resultado = $cmd->fetch(PDO::FETCH_ASSOC);
foreach($resultado as $key =>$value){

     echo $key . ": " . $value . "<br>";

}*/











?>