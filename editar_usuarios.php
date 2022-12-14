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

<center><h1>EDITAR USUÁRIO</h1>
<form method="POST" action="editar_usuario_submit.php">
    <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
    Nome: <br>
    <input type="text" name="nome" id="nome_usu_edit" value="<?php echo $info['nome']; ?>"><br><br>
    Email: <br>
    <input type="text" name="email" id="email_usu_edit" value="<?php echo $info['email']; ?>"><br><br>
    Permissoes: <br>
    <input type="text" name="permissoes" id="perm_usu_edit" value="<?php echo $info['permissoes']; ?>"><br><br>

    <input type="submit" class="btn btn-default"  value="SALVAR">
</form>
<br>
</center>
<?php require 'inc/footer.inc.php';?>