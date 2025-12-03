<?php 
ini_set('session.cookie_lifetime', 0);  // cookie expira ao fechar navegador
ini_set('session.gc_maxlifetime', 1800); // 30 minutos opcional
session_start();
require_once '../core/conexao.php';
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>

    <link rel="stylesheet" href="../public/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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

        .eye-icon {
            color: #000 !important;
            font-size: 20px;
            opacity: .8;
            transition: .2s;
        }

        .eye-icon:hover {
            opacity: 1;
        }
    </style>
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
            <img src="img/shopping-cart-white-icon.webp" alt="Carrinho">
            <span id="cart-count">0</span>
        </a>
    </nav>
</header>

<div class="signup-box">
    <h2>Criar Conta</h2>

    <!-- FORMULÁRIO CORRETAMENTE ESTRUTURADO -->
    <form action="../app/insert_endereco.php" method="POST" id="endereco">
        <!-- ENDEREÇO -->
        <input type="text" name="endereco" id="endereco" placeholder="Endereço" required>

        <input type="text" name="numero" id="numero" placeholder="Número" required>
    
        <input type="text" name="complemento" id="complemento" placeholder="Complemento (opcional)">

        <input type="text" name="cep" id="cep" placeholder="CEP" maxlength="9" required oninput="mascaraCEP(this)">

        <input type="text" name="cidade" id="cidade" placeholder="Cidade" required>

        <input type="text" name="estado" id="estado" placeholder="Estado" required>

        <!-- BOTÃO -->
        <button type="submit" onclick="return validarCadastro();">
            Criar Conta
        </button>
   
    <p>Já tem conta? <a href="login.php">Entrar</a></p>
</div>
</form>
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

<script src="../public/script.js"></script>
</body>
</html>
