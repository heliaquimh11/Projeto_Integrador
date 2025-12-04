
<?php
ini_set('session.cookie_lifetime', 0);  // cookie expira ao fechar navegador
ini_set('session.gc_maxlifetime', 1800); // 30 minutos opcional
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] != 1) {
    header("Location: ../views/log.php"); 
    exit;
}
?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Carrinho</title>

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
            <img src="img/shopping-cart-white-icon.webp" alt="Carrinho">
            <span id="cart-count">0</span>
        </a>
    </nav>
</header>

<!-- Container de Itens do Carrinho -->
<main style="width:90%; margin:60px auto;">
    <section id="carrinho-container"></section>
</main>

<!-- Resumo da Compra -->
<section id="resumo-compra"
    style="width:90%; margin:20px auto; padding:20px; background:#111; color:white;
           border:1px solid #222; border-radius:10px;">

    <h2>Resumo da Compra</h2>

    <p id="subtotal">Subtotal: R$ 0,00</p>
    <p id="frete" style="color:#4ee44e; font-weight:bold;">Frete Grátis</p>

    <div style="margin-top:20px;">
        <label for="input-cupom"><strong>Cupom de Desconto</strong></label><br>

        <input id="input-cupom" type="text" placeholder="Digite seu cupom"
               style="padding:10px; width:200px; background:#222; border:1px solid #444; color:white;">

        <button id="btn-cupom" style="padding:10px 20px; margin-left:10px; cursor:pointer;">
            Aplicar
        </button>

        <p id="desconto-texto" style="margin-top:10px; color:#00c3ff;"></p>
    </div>

    <h2 id="total" style="margin-top:20px;">Total: R$ 0,00</h2>
</section>

<!-- Finalizar compra -->
<div style="text-align:center; margin-bottom:40px;">
   <form action="../views/finalizar.php" method="post">
    <button type="submit">Comprar</button>
</form>
</div>
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

<script>
    carregarCarrinho();
    calcularResumo();
</script>
</body>
</html>
