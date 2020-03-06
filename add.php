<?php
require_once "connect.php";
$nome = isset($_POST['nome']) ? $_POST['nome']:null; 
$email = isset($_POST['email']) ? $_POST['email']:null; 
$senha = isset($_POST['senha']) ? $_POST['senha']:null; 
if(isset($_POST['filme']))
{
    $filme = $_POST['filme'];
    $filme_implode = implode(",",$filme);
}
$radio = $_POST['radio'];
$seleciona = $_POST['seleciona'];   
$texto = isset($_POST['texto']) ? $_POST['texto']:null; 
$dia = isset($_POST['dia']) ? $_POST['dia']:null; 
if (isset($_POST['enviar'])) 
            {
                $formatos = array("png", "jpeg", "jpg", "gif");
                $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
                if (in_array($extensao, $formatos)) 
                {
                    $pasta = "arquivos/";
                    $temporario = $_FILES['arquivo']['tmp_name'];
                    $novoNome = uniqid(). ".$extensao";
                    (move_uploaded_file($temporario, $pasta.$novoNome)); 
                    
                }
                $nome_foto = date('d/m/Y') . '_' . $_FILES['arquivo']['name'];  
            }
if (empty($nome) || empty($email) || empty($senha)) 
{
    echo "Volte e preencha todos os campos";
    exit;
}
$sql = "INSERT INTO usuarios (nome, email, senha, filme, radio, seleciona, texto, dia, arquivo) VALUES (:nome, :email, :senha, :filme, :radio, :seleciona, :texto, :dia, :arquivo)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', md5($senha));
$stmt->bindParam(':filme', $filme_implode);
$stmt->bindParam(':radio', $radio);
$stmt->bindParam(':seleciona', $seleciona);
$stmt->bindParam(':texto', $texto);
$stmt->bindParam(':dia', $dia);
$stmt->bindParam(':arquivo', $nome_foto);

if ($stmt->execute()) 
{
    header('Location:index.php');
}else 
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}