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
       <input class="login_input" type="text" name="nome" placeholder="Nome Completo" maxlength="30">
       <input class="login_input" type="text"  name="telefone" placeholder="Telefone" maxlength="30">
       <input class="login_input" type="email" name="email" placeholder="Usuario" maxlength="40">
       <input class="login_input" type="password" name="senha" placeholder="Senha" maxlength="15">
       <input class="login_input" type="password" name="confiSenha" placeholder="Confirmar senha" maxlength="15">
       <input class="login_submit" type="submit" value="Cadastrar">
    </form>
</div>
<?php
if(isset($_POST['nome']))
{

    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confiSenha = addslashes($_POST['confiSenha']);
    if(!empty($nome)  && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confiSenha)){

        $u->__construct("senacprojeto", "localhost", "root", "");
            if($senha == $confiSenha){

              if($u->cadastrarUsuario($nome, $telefone, $email, $senha)){
                ?>
                <div id="msg_sucesso">
                Cadastrado com sucesso !
                </div>
                <?php
              }else{
                ?>
                <div id="msg_sucesso">
                  Email já cadastrado
                  </div>
                <?php
                  
              }
            }else{
                ?>
                <div id="msg_alerta">
                Senhas Não correspondem
                </div>
                <?php
            }
        }else{
             echo "Erro: ". $u->$e;
           
                
        }

    }

?>
</main>
    
</body>
</html>