<?php 

$host = "localhost";
$dbname = "agenda_php";
$user = "root";
$pass = "";

try {

    $connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    // ativar modo de erros
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    //erro na conexao
    $error = $e->getMessage();
    echo "Erro: $error";
}