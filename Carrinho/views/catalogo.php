<?php require_once __DIR__ . '/../core/sessao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Catálogo</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="logo">PRAY FOR MERCY</div>
    <nav>
        <a href="index.html">Início</a>
        <a href="catalog.html">Catálogo</a>
        <a href="login.html">Login</a>

        <a href="carrinho.html" class="cart-icon">
            <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrinho">
            <span id="cart-count">0</span>
        </a>
    </nav>
</header>

<input type="text" id="search" placeholder="Buscar produto..." onkeyup="buscarProduto()">

<div class="catalog-container" style="display:flex; flex-wrap:wrap; justify-content:center; gap:30px; padding-bottom:50px;">
    <div class="card fade">
        <img src="https://via.placeholder.com/300x400">
        <h3>Camiseta Essencial</h3>
        <p>R$ 129,90</p>
        <button onclick="addCarrinho('Camiseta Essencial', 129.90, 'https://via.placeholder.com/300x400')">Adicionar</button>
    </div>
    <div class="card fade">
        <img src="https://via.placeholder.com/300x400">
        <h3>Calça Casual</h3>
        <p>R$ 179,90</p>
        <button onclick="addCarrinho('Calça Casual', 179.90, 'https://via.placeholder.com/300x400')">Adicionar</button>
    </div>
    <div class="card fade">
        <img src="https://via.placeholder.com/300x400">
        <h3>Tênis Urbano</h3>
        <p>R$ 299,90</p>
        <button onclick="addCarrinho('Tênis Urbano', 299.90, 'https://via.placeholder.com/300x400')">Adicionar</button>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>
