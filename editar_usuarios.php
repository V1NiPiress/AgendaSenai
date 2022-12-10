<?php 
require 'inc/header.inc.php';
require 'classes/usuario.class.php';
$usuario = new Usuarios();

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $info = $usuario->buscar($id);
    if(empty($info['email'])){
        header("Location: gestao_usuarios.php");
        exit;
    }
}else{
    header("Location: gestao_usuarios.php");
    exit;
}
?>

<h1>EDITAR USUÁRIO</h1>
<form method="POST" action="editar_usuario_submit.php">
    <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
    Nome: <br>
    <input type="text" name="nome" value="<?php echo $info['nome']; ?>"><br><br>
    Email: <br>
    <input type="text" name="email" value="<?php echo $info['email']; ?>"><br><br>
    Senha: <br>
    <input type="text" name="senha" value="<?php echo $info['senha']; ?>"><br><br>
    Permissoes: <br>
    <input type="text" name="permissoes" value="<?php echo $info['permissoes']; ?>"><br><br>

    <input type="submit"  value="SALVAR EDIÇÃO">
</form>

<?php require 'inc/footer.inc.php';?>