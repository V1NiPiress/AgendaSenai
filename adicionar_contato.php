<?php require 'inc/header.inc.php';?>

<center><h1>ADICIONAR CONTATO</h1>
<form method="post" action="adicionar_contato_submit.php"> 
    Nome: <br>
    <input type="text" name="nome" id="nome_cont_add"><br><br>
    DDD: <br>
    <input type="text" name="ddd" id="ddd_cont_add"><br><br>
    Telefone: <br>
    <input type="text" name="telefone" id="telefone_cont_add"><br><br>
    Email: <br>
    <input type="email" name="email" id="email_cont_add"><br><br>
    CPF: <br>
    <input type="text" name="cpf" id="cpf_cont_add"><br><br>
    Endereço: <br>
    <input type="text" class="" name="endereco" id="endereco_cont_add"><br><br>

    <input type="submit" class="btn btn-default" name="btCadastrar" value="ADICIONAR">
</form><br>
</center>


<?php require 'inc/footer.inc.php';?>