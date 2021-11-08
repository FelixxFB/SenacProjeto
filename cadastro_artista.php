<?php

require_once 'artista_modelo.php';
$a = new Artista ("senacprojeto","localhost","root","");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_artista.css">
    <title>Cadastro artista</title>
</head>

<body>
    <?php
    if(isset($_POST['nome'])){

        if(isset($id_update) && !empty($_GET['id_up'])){
            $id_upd = addslashes($_GET['id_up']);
            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            if(!empty($nome) && !empty($telefone) && !empty($email)){
    
            $a->atualizarDados($id_upd, $nome, $telefone, $email);
            header("location: cadastro_artista.php");
    
               
    
            } else {
    
                ?>
                <div class="aviso">
                <h4>Preencha todos os campos</h4>
                </div>
                <?php
            
            }

            }else{
            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            if(!empty($nome) && !empty($telefone) && !empty($email)){
    
                if(!$a->cadastrarArtista($nome, $telefone, $email)){
                    ?>
                    <div class="aviso">
                    <h4>Email já cadastrado</h4>
                    </div>
                    <?php
                }

    
            } else {
                ?>
                <div class="aviso">
                <h4>Preencha todos os campos</h4>
                </div>
                <?php
            }


        }
        
    }
    ?>

    <?php
    if(isset($_GET['id_up'])){

        $id_update = addslashes($_GET['id_up']);
        $res = $a->buscarDadosArtista($id_update);
    
    
    }
    ?>
            <section id="esquerda">
            
            <form method="POST">
                <h1>Registrar</h1>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" 
                value="<?php if(isset($res)){echo $res['nome'];}?>">

                <label for="telefone">Telefone</label>
                <input type="tel" name="telefone" id="telefone" 
                value="<?php if(isset($res)){echo $res['telefone'];}?>">
                
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php if(isset($res)){echo $res['email'];}?>">

                <input type="submit" 
                value="<?php if(isset($res)){echo "Atualizar";}else{echo"Cadastrar";}?>">
            </form>
            </section>


            <section id="direita">
            <table>
                <tr id="titulo">
                    <td>Nome</td>
                    <td>Telefone</td>
                    <td colspan="2">Email</td>
                </tr>

                <?php
                $dados = $a->buscarDados();
                if(count($dados) > 0){

                    for ($i=0; $i < count($dados) ; $i++) {

                        echo"<tr>";
                        foreach($dados[$i] as $k => $v) {
                            if ($k != "id"){
                                echo"<td>" . $v . "</td>";

                            }

                        }
                        ?>
                        <td>
                            <a href="cadastro_artista.php?id_up=<?php echo $dados[$i]['id'];?>">Editar</a>
                            <a href="cadastro_artista.php?id=<?php echo $dados[$i]['id'];?>">Excluir</a>
                        </td>
                        <?php
                        
                        echo"</tr>";
                    }
                
                } else {
                    ?>
                    </table>
                    <div class="aviso">
                    <h4>Ainda não tem artista cadastrados</h4>
                    </div>

                    <?php
                }
                ?>
                
            </section>
</body>
</html>

<?php
if(isset($_GET['id'])){

    $id_artista = addslashes($_GET['id']);
    $a->excluirArtista($id_artista);
    header("location: cadastro_artista.php");

}



?>
