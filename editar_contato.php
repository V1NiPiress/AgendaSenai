<?php 
require 'inc/header.inc.php';
require 'classes/contatos.class.php';
$contato = new Contatos();

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $info = $contato->busca($id);
    if(empty($info['email'])){
        header("Location: /senai_agenda");
        exit;
    }
}else{
    header("Location: /senai_agenda");
    exit;
}
?>

<center><h1>EDITAR CONTATO</h1>
<form method="POST" action="editar_contato_submit.php">
    <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
    Nome: <br>
    <input type="text" name="nome" id="nome_cont_edit" value="<?php echo $info['nome']; ?>"><br><br>
    DDD: <br>
    <input type="text" name="ddd" id="ddd_cont_edit" value="<?php echo $info['ddd']; ?>"><br><br>
    Telefone: <br>
    <input type="text" name="telefone" id="telefone_cont_edit" value="<?php echo $info['telefone']; ?>"><br><br>
    Email: <br>
    <input type="email" name="email" id="email_cont_edit" value="<?php echo $info['email']; ?>"><br><br>
    CPF: <br>
    <input type="text" name="cpf" id="cpf_cont_edit" value="<?php echo $info['cpf']; ?>"><br><br>
    Endereço: <br>
    <input type="text" name="endereco" id="endereco_cont_edit" value="<?php echo $info['endereco']; ?>"><br><br>

    <input type="submit" class="btn btn-default" value="SALVAR">
</form>
</center>
<?php require 'inc/footer.inc.php';?>