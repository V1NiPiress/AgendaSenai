<?php require 'inc/header.inc.php';?>

<h1>ADICIONAR USUARIO</h1>
 

<form method="post" action="adicionar_usuario_submit.php">
    Nome: 
    <input type="text" name="nome"><br><br>
  
    Email: 
    <input type="email" name="email"><br><br>
    
    Senha: 
    <input type="password" name="senha"><br><br>
    
    <legend>PERMISSÕES:</legend>
    <br>
    
    
        <div>
            <input type = "checkbox" name= "permissoes" value = "ADD"> ADICIONAR <br>
            <input type = "checkbox" name= "permissoes" value = "EDIT"> EDITAR <br>
            <input type = "checkbox" name= "permissoes" value = "DELETE"> DELETAR <br>
            <input type = "checkbox" name= "permissoes" value = "SUPER"> SUPER <br>
        
        </div> 
    

    <input type="submit" name="btCadastrar" value="ADICIONAR">
</form>  

<?php require 'inc/footer.inc.php';?>

