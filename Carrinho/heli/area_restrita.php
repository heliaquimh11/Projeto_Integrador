<?php
session_start();

// Se NÃO estiver logado, manda voltar pro login
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Área Restrita</title>
</head>
<body>

    <h2>Área Restrita</h2>
    <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</p>

    <p>Somente usuários logados podem ver isso.</p>

    <a href="logout.php">Sair</a>

</body>
</html>