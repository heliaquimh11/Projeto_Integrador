<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>

    <link rel="stylesheet" href="../public/style.css">

    <style>
        .admin-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ccc;
        }

        input, button {
            padding: 10px;
        }

        .btn-edit {
            background: #007bff;
            color: white;
            border: none;
            padding: 6px 10px;
            cursor: pointer;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
            border: none;
            padding: 6px 10px;
            cursor: pointer;
        }

        .btn-add {
            background: #000;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 15px;
            cursor: pointer;
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
        <a href="login-admin.php">Admin</a>
    </nav>
</header>

<div class="admin-container">
    <h2>Painel Administrativo</h2>

    <h4>Adicionar Produto</h4>

    <input id="nome" type="text" placeholder="Nome do produto">
    <input id="preco" type="text" placeholder="Preço">
    <input id="img" type="text" placeholder="URL da imagem">

    <button class="btn-add" onclick="addProduto()">Adicionar</button>

    <table id="tabela">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<footer class="bg-dark text-center text-white py-3 mt-5">
  © 2025 NDOC.
</footer>

<script src="../public/script.js"></script>

</body>
</html>
