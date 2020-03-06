<?php 
require_once "connect.php";
$nome  = isset($_POST['nome'])  ? $_POST['nome'] :null;
$email = isset($_POST['email']) ? $_POST['email']:null;
$senha = isset($_POST['senha']) ? $_POST['senha']:null;
$id    = isset($_POST['id'])    ? $_POST['id']   :null;
if(isset($_POST['filme']))
{
    $filme = $_POST['filme'];
    $filme_implode = implode(",",$filme);
}
$radio = $_POST['radio'];
$seleciona = $_POST['seleciona'];
    
$texto = isset($_POST['texto']) ? $_POST['texto']:null;
$dia  = isset($_POST['dia']) ? $_POST['dia']:null;

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
                
                global $PDO;
                $nome_foto = date('d/m/Y') . '_' . $_FILES['arquivo']['name'];  
            }
if (empty($nome) || empty($email) || empty($senha)) 
{
    echo "Volte e preencha todos os campos";
    exit;
}
$sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, filme = :filme, radio = :radio, seleciona = :seleciona, texto = :texto, dia, = :dia, arquivo = :arquivo WHERE id = :id";
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
$stmt->bindParam(':id', $id);
if ($stmt->execute()) 
{
    header('Location:index.php');
}else 
{
    echo "Erro ao atualizar dados";
    print_r($stmt->errorInfo());
}