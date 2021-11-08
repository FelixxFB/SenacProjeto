<?php
require_once 'usuario_modelo.php';
$u = new Usuario ("senacprojeto","localhost","root","");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/css_usuario.css">
    <title>Login</title>
</head>
<body>

<main class="login">
<div class="login_container">
<h1 class="login_title">Entrar</h1>
<form class="login_form" method="POST">
       <input class="login_input" type="email" name="email" placeholder="Usuário">
       <span class="login_input-border"></span>
       <input class="login_input" type="password" name="senha" placeholder="Senha">
       <span class="login_input-border"></span>
       <input class="login_submit" type="submit" value="Acessar">
       <a class="login_reset" href="cadastrar_usuario.php">Ainda não é cadastrado? <strong>Clique aqui !</strong></a> 
</form>
</div>












<?php
if(isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    if(!empty($email) && !empty($senha)){

        $u->__construct("senacprojeto", "localhost", "root", "");
        if($u->logar($email, $senha)){

            header("location: ../Artista/cadastro_artista.php");
       }else{
        ?>
        <div id="msg_alerta">
        Email e/ou senha incorretos !
        </div>
        <?php
       }
    }else{
        ?>
        <div id="msg_alerta">
        Preencha todos os campos!
        </div>
        <?php
    }
}
?>  
</body>
</html>