<?php
$host ='localhost';
$dbname = 'loja_projeto';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $erro) {
    die("Erro ao conectar ao banco: " . $erro->getMessage());
}
?>