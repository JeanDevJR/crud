<?php
require_once "connect.php";
?>
<html>
    <head></head>
    <body>
        <h1>CRUD COM PDO</h1>
        <h2>Adicionar Usuario</h2>
        <form action="add.php" method="POST" enctype="multipart/form-data">
        <label>Nome</label>
            <br>
            <input type="text" name="nome">
            <br><br>
            <label>Email</label>
            <br>
            <input type="email" name="email">
            <br><br>
            <label>Senha</label>
            <br>
            <input type="password" name="senha">
            <br><br>
            <input type="checkbox" name="filme[]" value="aventura" checked>Aventura
            <input type="checkbox" name="filme[]" value="acao">Acao
            <input type="checkbox" name="filme[]" value="corrida">Corrida<br><br>
            <input type="radio" name="radio" value="fm" checked>FM
            <input type="radio" name="radio" value="am">AM 
            <input type="radio" name="radio" value="sm">SM<br><br>
            <select name="seleciona">
                <option value="valor1" selected>Valor 1</option> 
                <option value="valor2">Valor 2</option>
                <option value="valor3">Valor 3</option>
            </select>
            <br><br>
            <textarea name="texto"></textarea>
            <br><br>
            Data<br>
            <input type="date" name="dia">
            <br><br>
            <input type="file" name="arquivo"><br><br>
            <input type="submit" name="enviar" value="Cadastrar">
            <a href="index.php">Voltar</a>
        </form>
    </body>
</html> 