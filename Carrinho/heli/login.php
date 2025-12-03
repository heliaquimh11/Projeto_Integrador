<!-- index.php -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h1>Login</h1>

<?php
if (isset($_SESSION['erro_login'])) {
    echo "<p style='color:red'>" . $_SESSION['erro_login'] . "</p>";
    unset($_SESSION['erro_login']);
}
?>

<form method="post" action="../app/process_login.php">
    <label>Usuário:</label>
    <input type="text" name="usuario" required><br><br>

    <label>Senha:</label>
    <input type="password" name="senha" required><br><br>

    <button type="submit">Entrar</button>
</form>

</body>
</html>
