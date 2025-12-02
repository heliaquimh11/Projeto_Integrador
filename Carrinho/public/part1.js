// Arquivo: ../public/stepper.js

// A variável 'startStep' deve ser definida no seu arquivo HTML (part1.php)
// antes que este script seja carregado.

document.addEventListener('DOMContentLoaded', () => {
    // Inicializa o stepper
    var stepperEl = document.querySelector('#stepper');
    var stepper = new Stepper(stepperEl);

    // Verifica se a variável PHP injetada está disponível e é maior que 1
    if (typeof startStep !== 'undefined' && startStep > 1) {
        // Usa um loop para avançar o stepper até o passo desejado
        for (let i = 1; i < startStep; i++) {
            // Marca os steps anteriores como "completed"
            const step = document.querySelector(`.bs-stepper-header .step[data-target="#step-${i}"]`);
            if (step) {
                step.classList.add('completed');
            }
            // Chama o next apenas para avançar o visual
            if (i === startStep - 1) {
                // Pequeno atraso para garantir que o DOM e o Stepper estejam prontos
                setTimeout(() => {
                    stepper.next();
                }, 10);
            }
        }
    }

    // Marca o step atual como concluído (fica verde)
    window.marcarStepAtualComoCompleto = function() {
        const active = document.querySelector(".bs-stepper-header .step.active");
        if (active) {
            active.classList.add("completed");
        }
    }

    // Valida qualquer formulário por ID e SUBMETE (Step 1 e 2)
    window.validarForm = function(id) {
        let form = document.getElementById(id);

        // 1. Validação básica de campos required (HTML5)
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        marcarStepAtualComoCompleto();

        // 2. LÓGICA DE SUBMISSÃO: Envia os dados para o PHP
        if (id === 'form1' || id === 'form2') {
            form.submit(); // <-- ENVIA OS DADOS E RECARREGA A PÁGINA
            return; 
        }
        
        // Se a lógica acima não for atingida, avança visualmente
        stepper.next();
    }

    // Função do último step (cartão)
    window.finalizar = function(pulou) {

        if (!pulou) {
            let form3 = document.getElementById('form3');

            if (!form3.checkValidity()) {
                form3.reportValidity();
                return;
            }
        }

        marcarStepAtualComoCompleto();

        // LÓGICA FINAL: Se não pulou, submete o formulário 3
        if (!pulou) {
            document.getElementById('form3').submit();
        } else {
            // Se pulou, redireciona para uma página final
            alert("Cadastro finalizado! Redirecionando...");
            window.location.href = 'index.php';
        }
    }
});