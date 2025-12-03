<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="../public/style.css">

    <style>
        body {
            background: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        header {
            background: black;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #222;
        }

        header a {
            text-decoration: none;
            color: white;
            margin-right: 25px;
        }

        /* ---- CONTAINER ---- */

        .profile-container {
            width: 90%;
            max-width: 700px;
            margin: 120px auto;
            background: #0d0d0d;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #222;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        /* ---- TABS ---- */

        .tabs {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #333;
            margin-bottom: 20px;
        }

        .tab {
            width: 33%;
            text-align: center;
            padding: 12px 0;
            cursor: pointer;
            color: #bbb;
        }

        .tab.active {
            color: #fff;
            border-bottom: 2px solid white;
            font-weight: bold;
        }

        .content {
            display: none;
        }

        .content.active {
            display: block;
        }

        /* ---- FORM ---- */

        input {
            width: 100%;
            background: #111;
            border: 1px solid #444;
            padding: 10px;
            margin-top: 10px;
            color: #fff;
            border-radius: 6px;
        }

        .btn-save {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: white;
            color: black;
            font-weight: bold;
            border: none;
            cursor: pointer;
            border-radius: 6px;
        }

        /* ---- CARDS ---- */

        .item-card {
            background: #111;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #333;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .fav-btn {
            cursor: pointer;
            font-size: 22px;
            user-select: none;
        }

        .fav-btn.favorited {
            color: #ff4444;
        }

        /* --- RESPONSIVO --- */
        @media (max-width: 600px) {
            header {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }

            .tab {
                font-size: 14px;
            }

            .profile-container {
                margin-top: 80px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<header>
    <a href="index.php" style="font-size: 20px;">PRAY FOR MERCY</a>

    <nav>
        <a href="index.php">Início</a>
        <a href="catalogo.php">Catálogo</a>
        <a href="carrinho.php">Carrinho</a>
    </nav>
</header>

<div class="profile-container">

    <h2>Perfil</h2>

    <!-- ------------------------ TABS ---------------------------- -->

    <div class="tabs">
        <div class="tab active" id="btn-dados" onclick="openTab('dados')">Dados</div>
        <div class="tab" id="btn-historico" onclick="openTab('historico')">Histórico</div>
        <div class="tab" id="btn-favoritos" onclick="openTab('favoritos')">Favoritos</div>
    </div>

    <!-- ---------------------- DADOS ---------------------------- -->

    <div class="content active" id="dados">
        <input type="text" placeholder="Nome Completo">
        <input type="email" placeholder="Email">
        <input type="text" placeholder="Telefone">
        <input type="text" placeholder="Endereço">
        <button class="btn-save">Salvar</button>
    </div>

    <!-- ---------------------- HISTÓRICO ---------------------------- -->

    <div class="content" id="historico">
        <div class="item-card">
            <strong>Produto 1</strong>
            <span class="fav-btn" onclick="toggleFavorite('Produto 1', this)">♡</span>
        </div>

        <div class="item-card">
            <strong>Produto 2</strong>
            <span class="fav-btn" onclick="toggleFavorite('Produto 2', this)">♡</span>
        </div>
    </div>

    <!-- ---------------------- FAVORITOS ---------------------------- -->

    <div class="content" id="favoritos">
        <div id="favoritos-list"></div>
    </div>

</div>

<script src="../public/script.js"></script>
</body>
</html>
