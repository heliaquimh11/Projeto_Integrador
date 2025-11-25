<?php 
require_once __DIR__ . '/../core/sessao.php'; 


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

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

  
      .signup-box #btncontinuar{
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #000;
            color: white;
            border: none;
            cursor: pointer;
        }

        .signup-box #btncontinuar:hover {
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
    
    <nav>
        <div class="logo">PRAY FOR MERCY</div>
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
    <form action="../models/cliente.php" method="post"></form>
    <label for="name">Nome</label>
    <input type="text" placeholder="Nome completo">
    <label for="email">Email</label>
    <input type="email" placeholder="E-mail">
     <label for="password">Senha</label>
    <input type="password" placeholder="Senha">
     <label for="password">Confirme a Senha</label>
    <input type="password" placeholder="Confirmar senha">


    <a href="part2.php" id="btncontinuar">continuar</a>

    <p>Já tem conta? <a href="login.html">Entrar</a></p>
</div>

<footer>
    © 2025 Projeto 
</footer>

</body>
</html>
