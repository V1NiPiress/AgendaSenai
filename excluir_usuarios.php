<?php
include 'classes/usuario.class.php';
$usuarios = new Usuarios();

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $usuarios->excluir($id);
    header('Location: gestao_usuarios.php');
}else{
    echo '<script type="text/javascript">alert("Erro ao excluir usuario!");</script>';
    header('Location: gestao_usuarios.php');
}