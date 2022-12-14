<?php
require 'inc/header.inc.php';
session_start();
require 'classes/usuario.class.php';
if(!empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);

    $usuario = new Usuarios();
    if($usuario->fazerLogin($email, $senha)){
        header("Location: index.php");
        exit;
    }
    else{
        echo"Usuário e/ou senha estão INCORRETOS!";
    }
  }

?>

<center>

    
    <h1>LOGIN</h1>
    <form method="post">
        Email: <br>
        <input type="email" name="email" id="email_log"><br><br>
        Senha: <br>
        <input type="password" name="senha" id="senha_log"><br><br>
        <br>
        <input type="submit" class="btn btn-default" value="Entrar">
    </form> 
    

</center>
<br><br>
<?php require 'inc/footer.inc.php';?>
  