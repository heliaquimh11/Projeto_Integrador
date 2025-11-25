<?php
require_once __DIR__ . '/../core/sessao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <title>Criar Conta</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Stepper -->
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
                color:  #28a745 !important;
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

        <div id="stepper" class="bs-stepper">

            <!-- Cabeçalho -->
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

            <!-- CONTEÚDO DOS STEPS -->
            <div class="bs-stepper-content">

                <!-- STEP 1 -->
                <div id="step-1" class="content">
                    <form id="form1" method="post" action="../models/part1.php">

                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" required>

                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>

                        <label>Senha</label>
                        <input type="password" class="form-control" name="senha" required>

                    </form>

                    <button class="btn btn-dark mt-3 w-100" onclick="validarForm('form1')">Continuar</button>
                </div>

                <!-- STEP 2 -->
                <div id="step-2" class="content">
                    <form id="form2" method="post" action="../models/part2.php">

                        <label>Endereço</label>
                        <input type="text" class="form-control" name="endereco" required>

                        <label>Número</label>
                        <input type="text" class="form-control" name="numero" required>

                        <label>Complemento</label>
                        <input type="text" class="form-control" name="complemento" required>

                        <label>CEP</label>
                        <input type="text" class="form-control" name="cep" required>

                        <label>Cidade</label>
                        <input type="text" class="form-control" name="cidade" required>

                        <label>Estado</label>
                        <input type="text" class="form-control" name="estado" required>

                    </form>

                    <button class="btn btn-secondary mt-3 w-100" onclick="stepper.previous()">Voltar</button>
                    <button class="btn btn-dark mt-3 w-100" onclick="validarForm('form2')">Continuar</button>
                </div>

                <!-- STEP 3 (OPCIONAL) -->
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

                    <!-- BOTÃO DE PULAR -->
                    <button class="btn btn-secondary  mt-3 w-100" onclick="finalizar(true)">Pular</button>

                    <!-- FINALIZAR NORMALMENTE -->
                    <button class="btn btn-success mt-3 w-100" onclick="finalizar(false)">Finalizar</button>
                </div>

            </div>
        </div>
    </div>

    <footer>© 2025 Projeto</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>

<script>
    var stepper = new Stepper(document.querySelector('#stepper'));

    // Marca o step atual como concluído (fica verde)
    function marcarStepAtualComoCompleto() {
        const steps = document.querySelectorAll(".bs-stepper-header .step");
        const active = document.querySelector(".bs-stepper-header .step.active");

        if (active) {
            active.classList.add("completed");
        }
    }

    // Valida qualquer formulário por ID e avança
    function validarForm(id) {
        let form = document.getElementById(id);

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        marcarStepAtualComoCompleto(); // marca step concluído
        stepper.next();                // vai para o próximo
    }

    // Função do último step (cartão)
    function finalizar(pulou) {

        if (!pulou) {
            let form3 = document.getElementById('form3');

            if (!form3.checkValidity()) {
                form3.reportValidity();
                return;
            }
        }

        marcarStepAtualComoCompleto(); // marca como concluído

        alert("Cadastro finalizado!");
    }
</script>


</body>

</html>