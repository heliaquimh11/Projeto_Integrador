<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrativo</title>
    <link rel="stylesheet" href="../public/style.css">

    <style>
        body {
            padding-top: 12px; /* evita que o header cubra o conteúdo */
        }

        .login-box {
            width: 350px;
            margin: 40px auto;
            padding: 30px;
            border: 1px solid #ddd;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-box input,
        .login-box button {
            width: 100%;
            padding: 12px;
            margin-top: 12px;
        }

        .login-box button {
            background: #000;
            color: white;
            border: none;
        }

        .login-box button:hover {
            background: #333;
        }
    </style>
</head>
<body>

<header>
    <a href="index.php" class="logo" style="text-decoration:none; color:inherit;">
        PRAY FOR MERCY
    </a>

    <nav>
        <a href="index.php">Início</a>
        <a href="catalogo.php">Catálogo</a>
        <a href="log.php">Login</a>
        <a href="login-admin.php">Admin</a>

        <a href="carrinho.php" class="cart-icon">
            <img src="../public/img/shopping-cart-white-icon.webp" alt="Carrinho">
            <span id="cart-count">0</span>
        </a>
    </nav>
</header>

<div class="login-box">
    <h2>Login Administrativo</h2>

    <form action="../app/loginAdmin.php" method="post">
        <input name="email" type="email" placeholder="E-mail" required>
        <input name="senha" type="password" placeholder="Senha" required>

        <button type="submit">Entrar</button>
    </form>
</div>

<footer class="bg-dark text-center text-white py-3 mt-5">
  © 2025 NDOC.
</footer>

<script src="../public/script.js"></script>
</body>
</html>
