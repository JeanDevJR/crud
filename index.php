<?php 
require_once "connect.php";
$sql = "SELECT id, nome, email, senha, filme, radio, seleciona, texto, dia, arquivo FROM usuarios ORDER BY id ASC";
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<html>
<head></head>
<body>
    <h1>CRUD COM PDO</h1>
    <a href="form-add.php">Adicionar Usuario</a> ()
    <a href="form-like.php">Pesquisar Usuários</a>
    <h2>Lista de Usuarios</h2>
    <table width="100%" border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Filme</th>
            <th>Radio</th>
            <th>Select</th>
            <th>Textarea</th>
            <th>Data</th>
            <th>Imagem</th>
            <th>Acoes</th>
        </tr>
        <?php 
            while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) 
            { ?>
                <tr>
                    <td><?php echo $user['nome']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['senha']; ?></td>
                    <td><?php echo $user['filme']; ?></td>
                    <td><?php echo $user['radio']; ?></td>
                    <td><?php echo $user['seleciona']; ?></td>
                    <td><?php echo $user['texto']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($user['dia'])); ?></td>
                    <td><?php echo $user['arquivo']; ?></td>
                    <td>
                        <a href="form-edit.php?id=<?php echo $user['id']; ?>">Editar</a>
                        <a href="delete.php?id=<?php echo $user['id']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
    </table>
</body>
</html>