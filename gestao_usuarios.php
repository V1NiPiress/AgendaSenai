<?php require 'inc/header.inc.php';?>

<h1>USUÁRIOS</h1>
<form method="POST" action="usuario.class.php">
<h2>ADICIONAR</h2>    
<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
    Nome: <br>
    <input type="text" name="nome" value="<?php echo $info['nome']; ?>"><br><br>
    Email: <br>
    <input type="text" name="ddd" value="<?php echo $info['ddd']; ?>"><br><br>
    : <br>
    <input type="text" name="telefone" value="<?php echo $info['telefone']; ?>"><br><br>
    Email: <br>
    <input type="email" name="email" value="<?php echo $info['email']; ?>"><br><br>
    CPF: <br>
    <input type="text" name="cpf" value="<?php echo $info['cpf']; ?>"><br><br>
    Endereço: <br>
    <input type="text" name="endereco" value="<?php echo $info['endereco']; ?>"><br><br>

    <input type="submit"  value="SALVAR">
</form>


<?php require 'inc/footer.inc.php';?>