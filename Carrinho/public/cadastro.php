<?php 


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .signup-box {
            width: 350px;
            margin: 100px auto;
            padding: 30px;
            border: 1px solid #ddd;
        }

        .signup-box h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .signup-box input {
            width: 100%;
            padding: 12px;
            margin-top: 12px;
            border: 1px solid #aaa;
        }

        .signup-box button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #000;
            color: white;
            border: none;
            cursor: pointer;
        }

        .signup-box button:hover {
            background: #333;
        }

        .signup-box p {
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">PRAY FOR MERCY</div>
    <nav>
        <a href="index.html">Início</a>
        <a href="catalog.html">Catálogo</a>
        <a href="login.html">Login</a>

        <a href="carrinho.html" class="cart-icon">
            <img src="" alt="Carrinho">
            <span id="cart-count">0</span>
        </a>
    </nav>
</header>

<div class="signup-box">
    <h2>Criar Conta</h2>

    <input type="text" placeholder="Nome completo">
    <input type="email" placeholder="E-mail">
    <input type="password" placeholder="Senha">
    <input type="password" placeholder="Confirmar senha">

    <button>Criar Conta</button>

    <p>Já tem conta? <a href="login.html">Entrar</a></p>
</div>

<footer>
    © 2025 Projeto 
</footer>

</body>
</html>
