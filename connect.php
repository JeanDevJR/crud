<?php 

$PDO = new PDO("mysql:host=locahost;dbname=crud-estudo2", "root", "");

if (!$PDO) 
{
    echo "Erro ao conectar!";
}