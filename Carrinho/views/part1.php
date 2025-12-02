<?php
// views/part1.php
require_once '../core/conexao.php';
session_start();

// Lógica PHP para iniciar o stepper no passo 2 após o cadastro
// O seu script de cadastro deve redirecionar para: header("Location: part1.php?step=2");
$startStep = 1;
if (isset($_GET['step']) && is_numeric($_GET['step'])) {
    $startStep = (int)$_GET['step'];
    // Limpar o sucesso para não aparecer após o avanço do step
    if (isset($_SESSION['sucesso'])) {
        unset($_SESSION['sucesso']);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <title>Criar Conta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">

    <style>
        .signup-box {
            width: 100%;
            max-width: 500px;
            margin: 100px auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .step.completed .step-trigger {
            color: #28a745 !important;
        }

        footer {
            margin-top: 80px;
            text-align: center;
        }
    </style>
</head>

<body>

    <header>
        <nav class="text-center">
            <div class="logo">PRAY FOR MERCY</div>
            <a href="index.php">Início</a>
            <a href="catalogo.php">Catálogo</a>
           <a href="log.php">Login</a>
        </nav>
    </header>

    <div class="signup-box">
        <h2 class="text-center">Criar Conta</h2>

        <?php
        // Exibir mensagens de erro ou sucesso
        if (isset($_SESSION['erro'])) {
            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erro'] . '</div>';
            unset($_SESSION['erro']);
        }
        if (isset($_SESSION['sucesso'])) {
            echo '<div class="alert alert-success" role="alert">' . $_SESSION['sucesso'] . '</div>';
            unset($_SESSION['sucesso']);
        }
        ?>

        <div id="stepper" class="bs-stepper">

            <div class="bs-stepper-header d-flex justify-content-center" role="tablist">

                <div class="step" data-target="#step-1">
                    <button class="step-trigger">
                        <span class="bs-stepper-label">Dados Pessoais</span>
                    </button>
                </div>

                <div class="line"></div>

                <div class="step" data-target="#step-2">
                    <button class="step-trigger">
                        <span class="bs-stepper-label">Endereço</span>
                    </button>
                </div>

                <div class="line"></div>

                <div class="step" data-target="#step-3">
                    <button class="step-trigger">
                        <span class="bs-stepper-label">Cartão </span>
                    </button>
                </div>

            </div>

            <div class="bs-stepper-content">

                <div id="step-1" class="content">
                    <form id="form1" method="post" action="../models/part1.php">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" required>

                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>

                        <label>Senha</label>
                        <input type="password" class="form-control" name="senha" required>

                    </form>
                   <a href="log.php">Login</a>
                    <button class="btn btn-dark mt-3 w-100" type="button" onclick="validarForm('form1')">Continuar</button>
                </div>

                <div id="step-2" class="content">
                    <form id="form2" method="post" action="../models/part2.php">

                        <label>Endereço</label>
                        <input type="text" class="form-control" name="endereco" required>

                        <label>Número</label>
                        <input type="text" class="form-control" name="numero" required>

                        <label>Complemento</label>
                        <input type="text" class="form-control" name="complemento"> 
                        
                        <label>CEP</label>
                        <input type="text" class="form-control" name="cep" required>

                        <label>Cidade</label>
                        <input type="text" class="form-control" name="cidade" required>

                        <label>Estado</label>
                        <input type="text" class="form-control" name="estado" required>

                    </form>
                    <button class="btn btn-dark mt-3 w-100" type="button" onclick="validarForm('form2')">Continuar</button>
                </div>

                  <div id="step-3" class="content">
                    <form id="form3" method="post" action="../models/part3.php">

                        <label>Número do cartão</label>
                        <input type="text" class="form-control" name="num_cartao">

                        <label>Validade</label>
                        <input type="text" class="form-control" name="validade">

                        <label>CVV</label>
                        <input type="text" class="form-control" name="cvv">

                    </form>

                    <button class="btn btn-secondary mt-3 w-100" onclick="stepper.previous()">Voltar</button>

                    <button class="btn btn-secondary mt-3 w-100" onclick="finalizar(true)">Pular</button>

                    <button class="btn btn-success mt-3 w-100" onclick="finalizar(false)">Finalizar</button>
                </div>
        </div>
    </div>

    <footer>© 2025 Projeto</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>

<script>
    // Define a variável JS 'startStep' com base no valor PHP
    var startStep = <?php echo $startStep; ?>;
</script>

<script src="../public/part1.js"></script>

</body>
</html>

</body>

</html>