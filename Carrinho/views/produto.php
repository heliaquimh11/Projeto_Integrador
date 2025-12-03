<?php 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Produto</title>

<link rel="stylesheet" href="../public/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
/* ============================
   CONTAINER PRINCIPAL
============================ */
.produto-wrapper {
  max-width: 1100px;
  margin: 60px auto;
  padding: 20px 30px;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 50px;
}

/* Nome */
#prod-nome {
  grid-column: span 2;
  font-size: 32px;
  font-weight: 800;
  color: #ffffff;
  text-transform: uppercase;
  letter-spacing: 1px;
}

#prod-preco {
  grid-column: span 2;
  font-size: 28px;
  margin-top: -20px;
  margin-bottom: 20px;
  font-weight: bold;
  color: #ff2e2e;
}

/* ============================
   CARROSSEL
============================ */
.carousel-container {
  width: 100%;
  position: relative;
  border-radius: 14px;
  overflow: hidden;
  background: #0c0c0c;
  border: 1px solid #1f1f1f;
  box-shadow: 0 0 20px #000;
}

.carousel-container input {
  display: none;
}

.carousel-slides {
  display: flex;
  width: 200%;
  transition: transform 0.7s cubic-bezier(.25,.8,.25,1);
}

.slide {
  width: 100%;
}

.slide img {
  width: 100%;
  display: block;
}

/* Frente */
#img-frente:checked ~ .carousel-slides {
  transform: translateX(0);
}

/* Verso */
#img-verso:checked ~ .carousel-slides {
  transform: translateX(-50%);
}

/* Nav Buttons */
.nav {
  display: flex;
  justify-content: center;
  margin-top: 5px;
}

.nav label {
  padding: 12px 18px;
  background: #151515;
  color: #d7d7d7;
  border-radius: 30px;
  margin: 0 8px;
  border: 1px solid #292929;
  cursor: pointer;
  font-size: 14px;
  letter-spacing: .5px;
  transition: 0.3s;
}

.nav label:hover {
  background: #ff2e2e;
  border-color: #ff2e2e;
  color: #fff;
  box-shadow: 0 0 10px #ff2e2e;
}

/* ============================
   INFO DO PRODUTO
============================ */
.prod-info {
  padding: 20px;
}

select {
  padding: 10px;
  width: 100%;
  background: #121212;
  border: 1px solid #2d2d2d;
  color: #fff;
  border-radius: 8px;
  font-size: 15px;
  margin-bottom: 20px;
  transition: 0.3s;
}

select:hover {
  border-color: #ff2e2e;
}

.btn-cart {
  padding: 14px;
  width: 100%;
  background: linear-gradient(90deg, #ff2e2e, #b00000);
  color: #fff;
  font-size: 18px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 700;
  transition: 0.3s;
}

.btn-cart:hover {
  transform: scale(1.03);
  box-shadow: 0 0 18px #ff2e2e;
}

hr {
  opacity: 0.15;
  margin: 25px 0;
}

/* ============================
   AVALIAÇÃO
============================ */
.rating {
  display: flex;
  flex-direction: row-reverse;
  justify-content: flex-end;
  gap: 4px;
}

.rating input {
  display: none;
}

.rating label {
  font-size: 30px;
  color: #333;
  cursor: pointer;
  transition: .3s;
}

.rating label:hover,
.rating label:hover ~ label {
  color: #ff2e2e;
  text-shadow: 0 0 6px #ff2e2e;
}

.rating input:checked ~ label {
  color: #ff2e2e;
}

textarea {
  width: 100%;
  padding: 12px;
  background: #121212;
  border: 1px solid #2d2d2d;
  color: #fff;
  border-radius: 8px;
  margin-top: 15px;
  resize: vertical;
  transition: .3s;
}

textarea:hover {
  border-color: #ff2e2e;
}

.prod-info button:last-of-type {
  margin-top: 12px;
  padding: 12px;
  background: #1a1a1a;
  border: 1px solid #2a2a2a;
  border-radius: 8px;
  color: #fff;
  cursor: pointer;
  transition: .3s;
}

.prod-info button:last-of-type:hover {
  border-color: #ff2e2e;
  color: #ff2e2e;
}

/* ============================
   FOOTER
============================ */
footer {
  text-align: center;
  padding: 25px;
  background: #000;
  color: #7d7d7d;
  font-size: 14px;
  margin-top: 60px;
  border-top: 1px solid #1a1a1a;
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
    <a href="catalogo.php">Catálogo</a>
    <a href="login.php">Login</a>

    <a href="carrinho.php" class="cart-icon">
      <img src="../public/img/shopping-cart-white-icon.webp" alt="Carrinho">
      <span id="cart-count">0</span>
    </a>
  </nav>
</header>

<section class="produto-wrapper">

  <h1 id="prod-nome"></h1>
  <p id="prod-preco" class="preco"></p>

  <div class="carousel-container">
    <input type="radio" name="carousel" id="img-frente" checked>
    <input type="radio" name="carousel" id="img-verso">

    <div class="carousel-slides">
      <div class="slide">
        <img id="img1" src="../public/img/frente.webp" alt="Frente">
      </div>

      <div class="slide">
        <img id="img2" src="../public/img/verso.webp" alt="Verso">
      </div>
    </div>

    <div class="nav">
      <label for="img-frente">Frente</label>
      <label for="img-verso">Verso</label>
    </div>
  </div>

  <div class="prod-info">
    <label><strong>Tamanho:</strong></label>

    <select class="tamanho-select">
      <option value="Selecione">Selecione</option>
      <option value="P">P</option>
      <option value="M">M</option>
      <option value="G">G</option>
      <option value="GG">GG</option>
    </select>

    <button class="btn-cart">Adicionar ao Carrinho</button>

    <hr>

    <h3>Avaliações</h3>

    <div class="rating">
      <input type="radio" id="star-1" name="estrela">
      <label for="star-1">★</label>

      <input type="radio" id="star-2" name="estrela">
      <label for="star-2">★</label>

      <input type="radio" id="star-3" name="estrela">
      <label for="star-3">★</label>

      <input type="radio" id="star-4" name="estrela">
      <label for="star-4">★</label>

      <input type="radio" id="star-5" name="estrela">
      <label for="star-5">★</label>
    </div>

    <textarea rows="3" placeholder="Escreva sua avaliação..."></textarea>
    <button>Enviar avaliação</button>

  </div>

</section>

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
