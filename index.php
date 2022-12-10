<?php 
session_start();
include 'inc/header.inc.php';
include 'classes/contatos.class.php';
include 'classes/usuario.class.php';


if(!isset($_SESSION['logado'])){
        header("Location: login.php");
        exit;
}
$contatos = new Contatos();
$usuario = new Usuarios();
$usuario->setUsuario($_SESSION['logado']);
?>
        <h1>Agenda de Jorge Vinicius</h1>
        <hr>
        <?php if($usuario->temPermissoes('ADD')):?><button><a href="adicionar_contato.php">ADICIONAR</a></button>
        <?php endif; ?>
        <?php if($usuario->temPermissoes('SUPER')):?><button><a href="gestao_usuarios.php">GESTÃO DE USUÁRIOS</a></button>
        <?php endif; ?>
        <button><a href="sair.php">SAIR</a></button>
        <br><br><hr>
        <table border="1" width="100%">
        <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DDD</th>
                <th>CELULAR</th>
                <th>EMAIL</th>
                <th>CPF</th>
                <th>ENDEREÇO</th>
                <th>AÇÕES</th>
        </tr>
        <?php
                $lista = $contatos->listar();
                foreach($lista as $item):
        ?>
        <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['nome']; ?></td>
                <td><?php echo $item['ddd']; ?></td>
                <td><?php echo $item['telefone'];?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['cpf']; ?></td>
                <td><?php echo $item['endereco']; ?></td>
                <td>
                        <?php if($usuario->temPermissoes('EDIT')):?><button><a href="editar_contato.php?id=<?php echo $item['id']; ?>">EDITAR</a></button>
                                <?php endif; ?>
                        <?php if($usuario->temPermissoes('DELETE')):?><button><a href="excluir_contato.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Você tem certeza que deseja excluir este contato?')">EXCLUIR</a></button>
                                <?php endif; ?>
                </td>
        </tr>
        <?php
                endforeach;
        ?>
        </table>
<?php
include 'inc/footer.inc.php';
?>
        