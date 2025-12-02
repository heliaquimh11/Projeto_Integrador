<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
</head>
<body>

<h2>Cadastrar Novo Usuário</h2>

<!-- Exibe mensagens -->
<?php
if (isset($_SESSION['msg'])) {
    echo "<p style='color:blue'>" . $_SESSION['msg'] . "</p>";
    unset($_SESSION['msg']);
}
if (isset($_SESSION['erro'])) {
    echo "<p style='color:red'>" . $_SESSION['erro'] . "</p>";
    unset($_SESSION['erro']);
}
?>

<form action="cadastrar_usuario.php" method="post">
    <label>Usuário:</label><br>
    <input type="text" name="usuario" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br><br>

    <button type="submit">Cadastrar</button>
</form>

</body>
</html>
