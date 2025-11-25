<?php
require 'conexao.php';
require 'cliente.php';
require 'cadastro_cartão.php';

$mensagem = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $numero   = $_POST['numero'] ?? '';
    $validade = $_POST['validade'] ?? '';
    $cvv      = $_POST['cvv'] ?? '';

    $cartão = new cartão($pdo);

    if($cartão->insert($numero,$validade,$cvv)){
        $mensagem = "Dados do cartão inseridos com sucesso!";
    } else {
        $mensagem = "Erro ao inserir dados do cartão.";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome     = $_POST['nome'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $cep      = $_POST['cep'] ?? '';
    $numero   = $_POST['numero'] ?? '';

    $crud = new Ccrud ($pdo);

    if ($crud->inserir($nome, $endereco, $cep, $numero)) {
        $mensagem = "Dados do cliente inseridos com sucesso!";
    } else {
        $mensagem = "Erro ao inserir dados do cliente.";
    }
}
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
    <div class="logo">PRAY FOR MERCY</div>
    <nav>
        <a href="index.html">Início</a>
        <a href="catalog.html">Catálogo</a>
        <a href="login.html">Login</a>
        <a href="carrinho.html" class="cart-icon">
            🛒 <span id="cart-count">0</span>
        </a>
    </nav>
</header>

<div class="checkout-box">

    <h2>Finalizar Compra</h2>

    <?php if (!empty($mensagem)): ?>
        <p><strong><?= $mensagem ?></strong></p>
        <hr>
    <?php endif; ?>

    <p><strong>Produto:</strong> Camiseta Essencial</p>
    <p><strong>Preço:</strong> R$ 129,90</p>

    <form action="finalizar.php" method="post">
        <h3 style="margin-top:20px;">Dados do Cliente</h3>

        <label>Nome Completo:</label>
        <input type="text" name="nome" placeholder="Nome Completo" required>

        <label>Endereço:</label>
        <input type="text" name="endereco" placeholder="Endereço" required>

        <label>CEP:</label>
        <input type="text" name="cep" placeholder="CEP" required>

        <label>Número:</label>
        <input type="text" name="numero" placeholder="Número" required>

        <button type="submit">Salvar Dados</button>
    </form>

    <hr>

    <h3>Pagamento</h3>

    <form action="pagamento.php" method="post">
        <input type="text" placeholder="Número do Cartão">
        <input type="text" placeholder="Validade">
        <input type="text" placeholder="CVV">
    </form>

    <a href="carrinho.php">
        <button>Confirmar Compra</button>
    </a>

</div>


<footer>
    © 2025 Projeto
</footer>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>s
</body>
</html>
