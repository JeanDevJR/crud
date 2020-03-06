<?php 
require_once "connect.php";
$id = isset($_GET['id']) ? $_GET['id']:null;
if (empty($id)) 
{
    echo "ID nao informado";
    exit;
}
$sql = "DELETE FROM usuarios WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
if ($stmt->execute()) 
{
    header('Location:index.php');
}else 
{
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}
