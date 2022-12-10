<?php require 'inc/header.inc.php';
include 'classes/usuario.class.php';
$usuario = new Usuarios();
?>

<h1>GESTÃO DE USUÁRIOS</h1>
        <hr>
         <button><a href="adicionar_usuario.php">ADICIONAR USUÁRIO</a></button>
        <button><a href="sair_usuario.php">VOLTAR</a></button>
         
         <table border="1" width="100%">
        <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>PERMISSÕES</th>
                <th>AÇÕES</th>

        </tr>
        <?php
                $lista = $usuario->listar();
                foreach($lista as $item):
        ?>
        <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['nome']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['permissoes']; ?></td>

                <td>
                        <button><a href="editar_usuarios.php?id=<?php echo $item['id']; ?>">EDITAR</a></button>
                        <button><a href="excluir_usuarios.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Você tem certeza que deseja excluir este usuario?')">EXCLUIR</a></button>
                </td>
        </tr>
        <?php
                endforeach;
        ?>
        </table>
         
            <br><br><hr>
         
