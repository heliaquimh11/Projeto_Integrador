<?php 
ini_set('session.cookie_lifetime', 0);  // cookie expira ao fechar navegador
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>

    <link rel="stylesheet" href="../public/style.css">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

<header>
    <a href="index.php" class="logo" style="text-decoration:none; color:inherit;">
        PRAY FOR MERCY
    </a>

    <nav>
        <a href="index.php">Início</a>
        <a href="catalogo.php">Catálogo</a>
        <a href="login.php">Login</a>

        <a href="carrinho.php" class="cart-icon">
            <img src="../public/img/shopping-cart-white-icon.webp" alt="Carrinho">
            <span id="cart-count">0</span>
        </a>
    </nav>
</header>

<input type="text" id="search" placeholder="Buscar produto..." onkeyup="buscarProduto()">

<aside id="filter-sidebar"
       style="position:fixed; left:20px; top:140px; width:180px;
              background:#0d0d0d; border:1px solid #222; padding:15px;
              border-radius:10px; z-index:50;">

    <h3 style="color:white; font-size:16px; margin-bottom:10px;">Filtros</h3>

    <label for="filter-category" style="color:white;">Categoria:</label>
    <select id="filter-category" onchange="filtrar()"
            style="width:100%; padding:8px; margin:6px 0 14px 0;
                   background:#111; color:white; border:1px solid #444; border-radius:5px;">
        <option value="todos">Todas</option>
        <option value="camiseta">Camisetas</option>
        <option value="calca">Calças</option>
        <option value="moletom">Moletom</option>
    </select>

    <label for="filter-price" style="color:white;">Preço:</label>
    <select id="filter-price" onchange="filtrar()"
            style="width:100%; padding:8px; margin-top:6px;
                   background:#111; color:white; border:1px solid #444; border-radius:5px;">
        <option value="todos">Todos</option>
        <option value="baixo">Até R$150</option>
        <option value="medio">R$150 - R$250</option>
        <option value="alto">Acima de R$250</option>
    </select>

</aside>

<button id="filter-btn" onclick="toggleFiltro()"
        style="display:none; position:fixed; top:90px; right:20px;
               z-index:1000; padding:10px 15px; background:#111;
               color:white; border:1px solid #333; border-radius:8px;">
    Filtros
</button>

<main class="catalog-container"
      style="display:flex; flex-wrap:wrap; justify-content:center; gap:30px; padding-bottom:50px;">

    <div class="card fade produto" data-category="camiseta" data-price="129.90">
    <img src="../public/img/jerseyronoaldinho-removebg-preview.png"  alt="Jersey Barça">
        <h3>Jersey Barça - Unissex</h3>
        <p>R$ 129,90</p>
        <button onclick="abrirProduto('jersey')">Ver Produto</button>
    </div>

    <div class="card fade produto" data-category="camiseta" data-price="109.90">
          <img src="../public/img/ronaldinhohoodie-removebg-preview.png"  alt="Camiseta Bag">
        <h3>Camiseta Bag - Unissex</h3>
        <p>R$ 109,90</p>
        <button onclick="abrirProduto('hoodie')">Ver Produto</button>
    </div>

    <div class="card fade produto" data-category="calca" data-price="199.90">
        <img src="../public/img/calcatakeoff-removebg-preview.png" alt="Calça Baggy TakeOff">
        <h3>Calça Baggy TakeOff - Unissex</h3>
        <p>R$ 199,90</p>
        <button onclick="abrirProduto('calca')">Ver Produto</button>
    </div>

</main>

<footer class="bg-black text-white text-center py-4 mt-5">
    <h5 class="fw-bold mb-3">Entre em contato conosco.</h5>

    <div class="d-flex justify-content-center gap-4">
        <a href="https://instagram.com/seuInstagram" target="_blank" class="text-white fs-3">
            <i class="bi bi-instagram"></i>
        </a>

        <a href="https://wa.me/5511999999999" target="_blank" class="text-white fs-3">
            <i class="bi bi-whatsapp"></i>
        </a>

        <a href="mailto:contato@seusite.com" class="text-white fs-3">
            <i class="bi bi-envelope-fill"></i>
        </a>
    </div>

    <p class="mt-3 mb-0">© 2025 PRAY FOR MERCY — Todos os direitos reservados.</p>
</footer>

<script src="../public/carrinho.js"></script>
<script src="../public/script.js"></script>
</body>
</html>