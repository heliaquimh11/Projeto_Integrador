<?php
// views/part1.php
require_once '../core/conexao.php';
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="style.css">
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

        .signup-box p {
            margin-top: 15px;
            text-align: center;
        }

        .eye-icon {
    color: rgb(0, 0, 0);
    font-size: 20px;
}
.eye-icon {
    color: rgb(0, 0, 0) !important;
    font-size: 20px;
    opacity: 0.8;
    transition: .2s;
}

.eye-icon:hover {
    opacity: 1;
}

    </style>
</head>
<body>

<header>
    <a href="index.html" class="logo" style="text-decoration:none; color:inherit;">
        PRAY FOR MERCY
      </a>
          <nav>
        <a href="index.html">Início</a>
        <a href="catalog.html">Catálogo</a>
        <a href="login.html">Login</a>

        <a href="carrinho.html" class="cart-icon">
            <img src="img/shopping-cart-white-icon.webp" alt="Carrinho">
            <span id="cart-count">0</span>
        </a>
    </nav>
</header>

<form action="../app/insert_login.php" method="POST">

    <div class="signup-box">
        <h2>Criar Conta</h2>

        <input type="text" id="nome" name="nome" placeholder="Nome completo" required>
        <input type="email" id="email" name="email" placeholder="E-mail" required>

        <div style="position:relative;">
            <input type="password" id="senha" name="senha" placeholder="Senha" required>
            <i class="bi bi-eye-fill eye-icon" onclick="toggleSenha('senha', this)"
            style="position:absolute; right:10px; top:35%; cursor:pointer;"></i>
        </div>

        <div style="position:relative;">
            <input type="password" id="confirmar" name="confirmar" placeholder="Confirmar senha" required>
            <i class="bi bi-eye-fill eye-icon" onclick="toggleSenha('confirmar', this)"
            style="position:absolute; right:10px; top:35%; cursor:pointer;"></i>
        </div>
  
        <p id="erro-senha" style="color:red; font-size:14px; display:none;">
            As senhas não coincidem.
        </p>
  </form>
  <form action="../app/insert_endereco.php" method="POST">
        <!-- ENDEREÇO -->
        <input type="text" id="endereco" name="endereco" placeholder="Endereço" required>

        <input type="text" id="numero" name="numero" placeholder="Número" required>

        <input type="text" id="complemento" name="complemento" placeholder="Complemento (opcional)">

        <input type="text" id="cep" name="cep" placeholder="CEP" maxlength="9" required oninput="mascaraCEP(this)">

        <input type="text" id="cidade" name="cidade" placeholder="Cidade" required>

        <input type="text" id="estado" name="estado" placeholder="Estado" required>

        <button type="submit">Criar Conta</button>

        <p>Já tem conta? <a href="login.html">Entrar</a></p>
    </div>
</form>





<footer class="bg-black text-white text-center py-4 mt-5">

    <h5 class="fw-bold mb-3">Entre em contato conosco.</h5>
  
    <div class="d-flex justify-content-center gap-4">
  
      <!-- Instagram -->
      <a href="https://instagram.com/seuInstagram" target="_blank" class="text-white fs-3">
        <i class="bi bi-instagram"></i>
      </a>
  
      <!-- WhatsApp -->
      <a href="https://wa.me/5511999999999" target="_blank" class="text-white fs-3">
        <i class="bi bi-whatsapp"></i>
      </a>
  
      <!-- Email -->
      <a href="mailto:contato@seusite.com" class="text-white fs-3">
        <i class="bi bi-envelope-fill"></i>
      </a>
  
    </div>
  
    <p class="mt-3 mb-0">© 2025 PRAY FOR MERCY — Todos os direitos reservados.</p>
  
  </footer>
  
  <script>

    // 1️⃣ MÁSCARA DE CEP
    function mascaraCEP(campo) {
        let v = campo.value.replace(/\D/g, "");
        if (v.length > 5) campo.value = v.substring(0, 5) + "-" + v.substring(5, 8);
        else campo.value = v;
    }
    
    // 4️⃣ MOSTRAR / OCULTAR SENHA
    function toggleSenha(id, icon) {
        const campo = document.getElementById(id);
    
        if (campo.type === "password") {
            campo.type = "text";
            icon.classList.remove("bi-eye-fill");
            icon.classList.add("bi-eye-slash-fill");
        } else {
            campo.type = "password";
            icon.classList.remove("bi-eye-slash-fill");
            icon.classList.add("bi-eye-fill");
        }
    }
    
    </script>
    

</body>
</html>
