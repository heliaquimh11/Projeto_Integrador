
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>PFM</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../public/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

<header>
  <a href="index.html" class="logo" style="text-decoration:none; color:inherit;">
    PRAY FOR MERCY
  </a>
  
  <nav>
    <a href="index.php">Início</a>
    <a href="catalogo.php">Catálogo</a>
    <a href="log.php">Login</a>

    <a href="carrinho.php" class="cart-icon">
      <img src="img/shopping-cart-white-icon.webp" alt="Carrinho">
      <span id="cart-count">0</span>
    </a>
  </nav>
</header>

<!-- Carousel -->
<div id="carouselPFM" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-inner">

    <div class="carousel-item active">
      <img src="img/3cc664b9-2d0b-42df-891b-51ef08a5c510.png" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
        <h5>Coleção 2025</h5>
        <p>Trazendo estilo com atitude com um toque minimalista.</p>
      </div>
    </div>

    <div class="carousel-item">
      <img src="img/chromecruz4k.png" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
        <h5>Novos Lançamentos</h5>
        <p>Peças exclusivas com conforto premium.</p>
      </div>
    </div>

    <div class="carousel-item">
      <img src="img/wp14391724.jpg" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
        <h5>Ofertas da Semana</h5>
        <p>Descontos imperdíveis nos produtos mais vendidos.</p>
      </div>
    </div>

  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselPFM" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselPFM" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<section class="banner text-center p-5 bg-black">
  <h1 class="display-5 fw-bold">YOU WILL PRAY FOR MERCY!!</h1>
  <p class="lead">Conforto, Minimalismo e Atitude.</p>
</section>

<div class="container my-5">
  <h2 class="title mb-4 text-center">DESTAQUES</h2>

  <div class="row g-4 justify-content-center">

    <div class="col-12 col-md-4">
      <div class="card text-decoration-none text-dark" onclick="abrirProduto('jersey')">
        <img src="img/jerseyfront-removebg-preview.png" class="card-img-top">
        <div class="card-body">
          <h3 class="card-title h5">Jersey Barça</h3>
          <p class="preco fw-bold">R$ 129,90</p>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-4">
      <div class="card text-decoration-none text-dark" onclick="abrirProduto('hoodie')">
        <img src="img/camisamochilafrente-removebg-preview.png" class="card-img-top">
        <div class="card-body">
          <h3 class="card-title h5">Camiseta Bag</h3>
          <p class="preco fw-bold">R$ 109,90</p>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-4">
      <div class="card text-decoration-none text-dark" onclick="abrirProduto('calca')">
        <img src="img/calcatakeoff-removebg-preview.png" class="card-img-top">
        <div class="card-body">
          <h3 class="card-title h5">Calça Baggy TakeOff</h3>
          <p class="preco fw-bold">R$ 199,90</p>
        </div>
      </div>
    </div>

  </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../public/script.js"></script>
</body>
</html>
