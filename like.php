<?php
require_once "connect.php";

$consulta = $_POST['consulta'];

$sql = "SELECT nome FROM usuarios WHERE nome LIKE :consulta";
$stmt = $PDO->prepare($sql);
$stmt->bindValue(':consulta', '%' . $consulta . '%');
$stmt->execute();

// cria um array com os resultados
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Resultado da Busca - ULTIMATE PHP</title>
    </head>
    <body>
        <h1>Resultados da busca</h1>
        <?php 
            foreach($usuarios as $item)
            {
                echo $item['nome'];?><br><?php
            }
        ?>
        <br>
        <a href="form-like.php">Voltar</a>
    </body>
</html>