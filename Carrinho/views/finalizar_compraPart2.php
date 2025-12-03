         
      <?php
session_start();
require_once '../core/conexao.php';

// Impedir acesso sem login
if (!isset($_SESSION['id_cliente'])) {
    header("Location: ../views/cadastro.php");
    exit;
}

$id_cliente = $_SESSION['id_cliente'];

// Buscar dados do cliente
$sql = "SELECT nome, endereco, cep, numero FROM cliente WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_cliente]);
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

// Buscar itens do carrinho (sessão)
// A estrutura correta é $_SESSION['carrinho'] que contém os produtos
$carrinho = $_SESSION['carrinho'] ?? [];

// Calcular total
$total = 0;
foreach ($carrinho as $item) {
    // Certificando-se de que estamos lidando com números
    $preco = isset($item['preco']) ? (float)$item['preco'] : 0;
    $qtd = isset($item['qtd']) ? (int)$item['qtd'] : 1; 

    $total += $preco * $qtd;
}
$_SESSION['total_compra'] = $total;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/style.css">
    <title>Finalizar Compra</title>

    <style>
        .checkout-box {
            width: 600px;
            margin: 140px auto;
            padding: 30px;
            border: 1px solid #ddd;
        }

        .checkout-box h2 {
            margin-bottom: 20px;
        }

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

        header {
            padding: 20px;
            background: #000;
            color: white;
        }

        nav a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">PRAY FOR MERCY</div>
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

        <h2>Finalizar Compra</h2>

       <<?php foreach ($carrinho as $item): ?>
            <li>
            <?= $item['nome'] ?> —
            <?= $item['qtd'] ?>x —
            R$ <?= number_format($item['preco'], 2, ',', '.') ?>
            </li>
        <?php endforeach; ?>
        </ul>

        <p><strong>Total:</strong>
            R$ <?= number_format($total, 2, ',', '.'); ?>
        </p>
        <hr>
        <h3>Pagamento</h3>
        <form action="../app/insert_cartao.php" method="post">
            <input type="text" name="cartao" placeholder="Número do Cartão" required>
            <input type="text" name="validade" placeholder="Validade" required>
            <input type="text" name="cvv" placeholder="CVV" required>
            <button type="submit">Pagar</button>
        </form>
    </div>
    <footer class="text-center py-4">
        © 2025 Projeto
    </footer>

    <script src="../public/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
         
