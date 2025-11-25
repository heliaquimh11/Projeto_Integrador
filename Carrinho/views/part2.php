
<?php 
require_once __DIR__ . '/../core/sessao.php'; 


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

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

  
      .signup-box #btncontinuar{
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #000;
            color: white;
            border: none;
            cursor: pointer;
        }

        .signup-box #btncontinuar:hover {
            background: #333;
        }
        .signup-box p {
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    
    <nav>
        <div class="logo">PRAY FOR MERCY</div>
        <a href="index.html">Início</a>
        <a href="catalog.html">Catálogo</a>
        <a href="login.html">Login</a>

        <a href="carrinho.html" class="cart-icon">
            <img src="" alt="Carrinho">
            <span id="cart-count">0</span>
        </a>
    </nav>
</header>

<div class="signup-box">
    <h2>Endereco</h2>
    <form action="../models/logradouro.php" method="post"></form>
    <label for="name">Nome</label>
    <input type="text" placeholder="Nome da Rua">
    <label for="name">complemento</label>
    <input type="text" placeholder="EX: Casa, Apartamento, etc">
     <label for="email">Número</label>
      <input type="text" placeholder="EX:250">
    <label for="email">Cep</label>
    <input type="email" placeholder="CEP: EX: 00000-000">

     <label for="password">Cidade</label>
    <select name="" id=""></select> <br>

     <label for="password">bairro</label>
    <input type="password" placeholder="Ex: Centro"> <br>

     <label for="password">Estado</label>
    <select name="" id=""></select>
     <br>
     

<br>
    <a href="part3.php" id="btncontinuar">continuar</a>

    <p>Já tem conta? <a href="login.html">Entrar</a></p>
</div>

<footer>
    © 2025 Projeto 
</footer>

</body>
</html>
