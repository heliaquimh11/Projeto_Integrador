
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>

    <link rel="stylesheet" href="../public/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        .checkout-box {
            width: 600px;
            margin: 140px auto;
            padding: 30px;
            border: 1px solid #790000;
            border-radius: 12px;
            background: #000000;
        }

        .checkout-box h2 {
            margin-bottom: 20px;
        }

        .checkout-box input, 
        .checkout-box select {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: 1px solid #aaa;
            border-radius: 6px;
        }

        .checkout-box button {
            margin-top: 20px;
            width: 100%;
            padding: 14px;
            background: #000;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .checkout-box button:hover {
            background: #6e0000;
        }
    </style>

    <script>
        function mostrarCampos() {
            const pagamento = document.getElementById("pagamento").value;
            const cartao = document.getElementById("campos-cartao");
            const pix = document.getElementById("campos-pix");

            if (pagamento === "cartao") {
                cartao.style.display = "block";
                pix.style.display = "none";
            } else {
                cartao.style.display = "none";
                pix.style.display = "block";
            }
        }
    </script>
</head>
<body>

<header>
    <a href="index.php" class="logo" style="text-decoration:none; color:inherit;">
        PRAY FOR MERCY
    </a>

    <nav>
        <a href="index.php">Início</a>
        <a href="catalog.php">Catálogo</a>
        <a href="login.php">Login</a>

        <a href="carrinho.php" class="cart-icon">
            <img src="../public/img/shopping-cart-white-icon.webp" alt="Carrinho">
            <span id="cart-count">0</span>
        </a>
    </nav>
</header>

<div class="checkout-box">

    <h2>Finalizar Compra</h2>

    <form action="confirmacao.php" method="POST">

        <h3>Dados do Cliente</h3>
        <input type="text" name="nome" placeholder="Nome Completo" required>
        <input type="text" name="endereco" placeholder="Endereço" required>
        <input type="text" name="cidade" placeholder="Cidade" required>
        <input type="text" name="cep" placeholder="CEP" required>

        <h3 style="margin-top:20px;">Pagamento</h3>

        <select name="pagamento" id="pagamento" onchange="mostrarCampos()">
            <option value="cartao">Cartão de Crédito</option>
            <option value="pix">PIX</option>
        </select>

        <!-- CARTÃO -->
        <div id="campos-cartao">
            <input type="text" name="numero_cartao" placeholder="Número do Cartão">
            <input type="text" name="validade" placeholder="Validade (MM/AA)">
            <input type="text" name="cvv" placeholder="CVV">
        </div>

        <!-- PIX -->
        <div id="campos-pix" style="display:none; margin-top:10px;">
            <p><strong>Chave PIX:</strong></p>
            <p style="background:#f1f1f1; padding:12px; border-radius:6px; font-size:15px; color:#000;">
                lojaprayformercy@pix.com
            </p>
            <p>Após o pagamento, seu pedido será confirmado automaticamente.</p>
        </div>

        <button type="submit">Confirmar Compra</button>
    </form>
</div>

<footer class="bg-black text-white text-center py-4 mt-5">
    <h5 class="fw-bold mb-3">Entre em contato conosco</h5>

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

<script src="../public/script.js"></script>
</body>
</html>
