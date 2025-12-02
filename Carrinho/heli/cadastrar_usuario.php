<?php
session_start();

// 1. Recebe os dados
$usuario = $_POST['usuario'] ?? '';
$senha   = $_POST['senha'] ?? '';

if ($usuario === '' || $senha === '') {
    $_SESSION['erro'] = "Preencha todos os campos.";
    header("Location: cadastro.php");
    exit;
}

// 2. Conectar ao banco
try {
    $pdo = new PDO("mysql:host=localhost;dbname=seu_banco;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 3. Verificar se usuário já existe
    $sql = "SELECT id FROM usuarios WHERE usuario = :usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usuario', $usuario);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['erro'] = "Usuário já existe!";
        header("Location: cadastro.php");
        exit;
    }

    // 4. Gerar hash da senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // 5. Inserir no banco
    $sql = "INSERT INTO usuarios (usuario, senha) VALUES (:usuario, :senha)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usuario', $usuario);
    $stmt->bindValue(':senha', $senhaHash);
    $stmt->execute();

    $_SESSION['msg'] = "Usuário cadastrado com sucesso!";
    header("Location: cadastro.php");
    exit;

} catch (PDOException $e) {
    $_SESSION['erro'] = "Erro: " . $e->getMessage();
    header("Location: cadastro.php");
    exit;
}
