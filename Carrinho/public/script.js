// ===============================
// CARRINHO
// ===============================
let carrinho = [];

// Carregar carrinho salvo no LocalStorage (opcional)
if (localStorage.getItem("carrinho")) {
    carrinho = JSON.parse(localStorage.getItem("carrinho"));
    renderizarCarrinho();
}

// ===============================
// ADICIONAR AO CARRINHO
// ===============================
function adicionarCarrinho(nome, preco, img) {
    preco = Number(preco);

    // Verifica se já existe
    let item = carrinho.find(p => p.nome === nome);

    if (item) {
        item.quantidade++;
    } else {
        carrinho.push({
            nome: nome,
            preco: preco,
            img: img,
            quantidade: 1
        });
    }

    salvarCarrinho();
    renderizarCarrinho();
}

// ===============================
// SALVAR LOCALMENTE
// ===============================
function salvarCarrinho() {
    localStorage.setItem("carrinho", JSON.stringify(carrinho));
}

// ===============================
// REMOVER ITEM
// ===============================
function removerItem(index) {
    carrinho.splice(index, 1);
    salvarCarrinho();
    renderizarCarrinho();
}

// ===============================
// ATUALIZAR QUANTIDADE
// ===============================
function alterarQuantidade(index, qtd) {
    qtd = Number(qtd);
    if (qtd <= 0) qtd = 1;

    carrinho[index].quantidade = qtd;
    salvarCarrinho();
    renderizarCarrinho();
}

// ===============================
// RENDERIZAR NA TELA
// ===============================
function renderizarCarrinho() {
    let container = document.getElementById("listaCarrinho");
    let totalElement = document.getElementById("totalCarrinho");

    container.innerHTML = "";
    let total = 0;

    carrinho.forEach((item, index) => {
        let subtotal = item.preco * item.quantidade;
        total += subtotal;

        container.innerHTML += `
            <div class="item-carrinho">
                <img src="${item.img}" width="80">
                <p><strong>${item.nome}</strong></p>
                <p>Preço: R$ ${item.preco.toFixed(2)}</p>

                <label>Qtd:</label>
                <input type="number" min="1" value="${item.quantidade}" onchange="alterarQuantidade(${index}, this.value)">

                <p>Subtotal: R$ ${subtotal.toFixed(2)}</p>

                <button onclick="removerItem(${index})">Remover</button>
                <hr>
            </div>
        `;
    });

    totalElement.innerHTML = "Total: R$ " + total.toFixed(2);
}

// ===============================
// FINALIZAR COMPRA
// ===============================
async function finalizarCompra() {

    if (carrinho.length === 0) {
        alert("Seu carrinho está vazio.");
        return;
    }

    try {
        let resposta = await fetch("finalizar.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(carrinho)
        });

        let resultado = await resposta.json();

        // Exibir retorno
        alert(resultado.message);

        if (resultado.success) {
            // limpar carrinho visual e localStorage
            carrinho = [];
            salvarCarrinho();
            renderizarCarrinho();

            // Redirecionar para página de sucesso (opcional)
            window.location.href = "sucesso.php?id=" + resultado.compra_id;
        }

    } catch (erro) {
        console.error("Erro ao finalizar compra:", erro);
        alert("Ocorreu um erro ao enviar a compra.");
    }
}
