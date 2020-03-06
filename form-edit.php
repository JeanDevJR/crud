<?php 
require_once "connect.php";
$id = isset($_GET['id']) ? $_GET['id']:null;
if (empty($id)) 
{
    echo "ID nao informado";
    exit;
}
$sql = "SELECT * FROM usuarios WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (!is_array($user)) 
{
    echo "Nenhum usuario encontrado";
    exit;
}
?>
<html>
    <head></head>
    <body>
        <h1>CRUD COM PDO</h1>
        <h2>Editar Usuario</h2>
        <form action="edit.php" method="POST" enctype="multipart/form-data">
        <label>Nome</label>
            <br>
            <input type="text" name="nome" value="<?php echo $user['nome']; ?>">
            <br><br>
            <label>Email</label>
            <br>
            <input type="email" name="email" value="<?php echo $user['email']; ?>">
            <br><br>
            <label>Senha</label>
            <br>
            <input type="password" name="senha" value="<?php echo $user['senha']; ?>">
            <br><br>
            <?php 
            $filme= $user['filme'];
            $filme_explode = explode(",",$filme);
            ?>
            <input type="checkbox" name="filme[]" value="aventura" <?php echo ((in_array('aventura', $filme_explode)) ? 'checked' : '' )?>>Aventura
            <input type="checkbox" name="filme[]" value="acao"     <?php echo ((in_array('acao', $filme_explode)) ? 'checked' : '' )?>>Acao
            <input type="checkbox" name="filme[]" value="corrida"  <?php echo ((in_array('corrida', $filme_explode)) ? 'checked' : '' )?>>Corrida
            <br><br>
            <input type="radio" name="radio" value="fm" <?php echo ($user['radio']=="fm" ) ? "checked" : null; ?>>FM
            <input type="radio" name="radio" value="am" <?php echo ($user['radio']=="am" ) ? "checked" : null; ?>>AM 
            <input type="radio" name="radio" value="sm" <?php echo ($user['radio']=="sm" ) ? "checked" : null; ?>>SM<br><br>
            <select name="seleciona">
                <option value="valor1" <?php echo ($user['seleciona']=="valor1" ) ? "selected" : null; ?>>Valor 1</option> 
                <option value="valor2" <?php echo ($user['seleciona']=="valor2" ) ? "selected" : null; ?>>Valor 2</option>
                <option value="valor3" <?php echo ($user['seleciona']=="valor3" ) ? "selected" : null; ?>>Valor 3</option>
            </select><br><br>
            <textarea name="texto"><?php echo $user['texto']; ?></textarea><br><br>
            <input type="date" name="dia" value="<?php echo $user['dia']; ?>"><br><br>
            <input type="file" name="arquivo"><br><br>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="enviar" value="Alterar">
            <a href="index.php">Voltar</a>
        </form>
    </body>
</html>