<?php
require_once __DIR__ . '/../core/sessao.php'; 
$total = 79.90; // ex preco
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Finalizar Compra</title>

    <style>
        .checkout-box {
            width: 600px;
            margin: 140px auto;
            padding: 30px;
            border: 1px solid #ddd;
        }
        .checkout-box h2 { margin-bottom: 20px; }
        .checkout-box input {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: 1px solid #aaa;
        }
        .checkout-box button {
            margin-top: 20px;
            width: 100%;
            padding: 14px;
            background: #000;
            color: white;
            border: none;
            cursor: pointer;
        }
        header{
            padding:20px;
            background:#000;
            color:white;
        }
        nav a{
            color:white;
            margin-left:20px;
            text-decoration:none;
        }
    </style>
</head>
<body>

<header>
    <div class="logo text-white">PRAY FOR MERCY</div>
    <nav>
        <a href="index.php">Início</a>
        <a href="catalogo.php">Catálogo</a>
        <a href="cadastro.php">Login</a>
        <a href="carrinho.php" class="cart-icon">
            🛒 <span id="cart-count">0</span>
        </a>
    </nav>
</header>

<div class="checkout-box">


    <h2>Cadaste Seu Cartão</h2>

    <form action="..//models/cadastro_cartão.php" method="post">
        <input type="text" placeholder="Número do Cartão">
        <input type="text" placeholder="Validade">
        <input type="text" placeholder="CVV">
    </form>

    <a href="../models/finalizarCompra.php">
        <button>Cadastrar</button>
    </a> <br>
    <p><a href="#">Pular etapa</a></p>

    <p>*cartao oculto</p>
</div>


<footer>
    © 2025 Projeto
</footer>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>s
</body>
</html>
