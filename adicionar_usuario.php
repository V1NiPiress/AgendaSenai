<?php require 'inc/header.inc.php';?>

<center><h1>ADICIONAR USUARIO</h1>
 <br>

<form method="post" action="adicionar_usuario_submit.php">
    Nome:<br> 
    <input type="text" name="nome" id="nome_usu_add"><br><br>
  
    Email:<br> 
    <input type="email" name="email" id="email_usu_add"><br><br>
    
    Senha:<br> 
    <input type="password" name="senha" id="senha_usu_add"><br><br>
    
    PERMISSÕES:<br>
    <input type="text" name="permissoes" id="perm_usu_add"><br><br>
    
    <input type="submit" class="btn btn-default" name="btCadastrar" value="ADICIONAR">
</form><br>  
</center>
<?php require 'inc/footer.inc.php';?>

