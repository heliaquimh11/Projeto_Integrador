<?php
session_start();

$usuario = $_POST['usuario'] ?? '';
$senha   = $_POST['senha'] ?? '';

// Conexão (exemplo PDO)
$pdo = new PDO("mysql:host=localhost;dbname=seu_banco;charset=utf8", "root", "");

// Busca usuário no banco
$sql = "SELECT id, usuario, senha FROM usuarios WHERE usuario = :usuario LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':usuario', $usuario);
$stmt->execute();


$dados = $stmt->fetch(PDO::FETCH_ASSOC);

if ($dados && password_verify($senha, $dados['senha'])) {
    $_SESSION['logado']  = true;
    $_SESSION['id']      = $dados['id'];
    $_SESSION['usuario'] = $dados['usuario'];

    header("Location: area_restrita.php");
    exit;
} else {
    $_SESSION['erro_login'] = "Usuário ou senha inválidos!";
    header("Location: login.php");
    exit;
}
