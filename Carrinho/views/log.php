<?php 
require_once __DIR__ . '/../core/sessao.php'; 

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../public/style.css">

    <style>
        .login-box {
            width: 350px;
            margin: 140px auto;
            padding: 30px;
            border: 1px solid #ddd;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-box input {
            width: 100%;
            padding: 12px;
            margin-top: 12px;
            border: 1px solid #aaa;
        }

        .login-box button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #000;
            color: white;
            border: none;
            cursor: pointer;
        }

        .login-box button:hover {
            background: #333;
        }

        .login-box p {
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">PRAY FOR MERCY</div>
    <nav>
        <a href="index.php">Início</a>
        <a href="catalogo.php">Catálogo</a>
        <a href="log.php">Login</a>

        <a href="carrinho.php" class="cart-icon">
            <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrinho">
            <span id="cart-count">0</span>
        </a>
    </nav>
</header>

<div class="login-box">
    <h2>Entrar</h2>
   <!-- login.php -->
    <form action="login.php" method="post">
    <label for="email">Email</label>
    <input type="email" placeholder="E-mail">
    <label for="email">Senha</label>
    <input type="password" placeholder="Senha">
    </form>

    <button>Entrar</button>

    <p>
        Não tem conta? <a href="part1.php">Criar Conta</a>
    </p>
</div>

<footer>
    © 2025 Projeto 
</footer>

</body>
</html>
