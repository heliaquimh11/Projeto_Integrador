<?php 
$host = 'localhost';
$dbname = 'projeto';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // CORREÇÃO DE SINTAXE: Removendo o espaço e ajustando a forma como as constantes são chamadas
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Em caso de falha de conexão, retorna um JSON de ERRO
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => "Erro de conexão com o banco de dados."]);
    exit;
}

