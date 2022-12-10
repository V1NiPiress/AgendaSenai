<?php
include 'classes/usuario.class.php';
include 'adicionar_usuario.php';

$usuario = new Usuarios();

if(!empty($_POST['email'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $permissoes = $_POST['permissoes'];

    $usuario->adicionar($nome, $email, $senha, $permissoes);
    header('Location: gestao_usuarios.php');
}else{
    echo '<script type="text/javascript">alert("Campo de email vazio!");</script>';
}

?>