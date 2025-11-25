<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carrinho</title>
<link rel="stylesheet" href="../public/style.css">

</head>
<body>

<header>
    <div class="logo">PRAY FOR MERCY</div>
    <nav>
        <a href="index.html">Início</a>
        <a href="catalogo.php">Catálogo</a>
        <a href="cadastro.php">Login</a>

        <a href="carrinho.php" class="cart-icon">
            <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrinho">
            <span id="cart-count">0</span>
        </a>
    </nav>
</header>

<div id="carrinho-container" style="width: 90%; margin: 140px auto;"></div>

<a href="finalizar.php">
    <button style="display:block; margin:40px auto; padding:14px 25px; background:#000; color:#fff; border:none;">Finalizar Compra</button>
</a>

<script src="../public/script.js"></script>
<script>
    carregarCarrinho();
</script>
</body>
</html>
