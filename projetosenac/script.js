/* -------------------------------
   SISTEMA DE CARRINHO
--------------------------------*/
let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];

// Adiciona produto ao carrinho
function addCarrinho(nome, preco, img) {
    carrinho.push({ nome, preco, img });
    localStorage.setItem("carrinho", JSON.stringify(carrinho));
    atualizarContador();
    alert("Produto adicionado ao carrinho!");
}

// Atualiza contador no ícone
function atualizarContador() {
    const contador = document.getElementById("cart-count");
    if (contador) {
        contador.innerText = carrinho.length;
    }
}

// Carrega itens na página carrinho.html
function carregarCarrinho() {
    const container = document.getElementById("carrinho-container");

    if (!container) return;

    if (carrinho.length === 0) {
        container.innerHTML = "<p>Seu carrinho está vazio.</p>";
        return;
    }

    carrinho.forEach((item, index) => {
        container.innerHTML += `
            <div class="cart-item fade">
                <img src="${item.img}">
                <div>
                    <h3>${item.nome}</h3>
                    <p>Preço: R$ ${item.preco}</p>
                    <button onclick="removerItem(${index})">Remover</button>
                </div>
            </div>
        `;
    });
}

// Remove item
function removerItem(i) {
    carrinho.splice(i, 1);
    localStorage.setItem("carrinho", JSON.stringify(carrinho));
    atualizarContador();
    location.reload();
}

/* -------------------------------
   BUSCA (CATALOGO)
--------------------------------*/
function buscarProduto() {
    let filtro = document.getElementById("search").value.toLowerCase();
    let cards = document.querySelectorAll(".card");

    cards.forEach(card => {
        let nome = card.querySelector("h3").innerText.toLowerCase();

        if (nome.includes(filtro)) {
            card.style.display = "block";
            card.classList.add("fade");
        } else {
            card.style.display = "none";
        }
    });
}

/* -------------------------------
   ANIMAÇÕES
--------------------------------*/
document.addEventListener("DOMContentLoaded", () => {
    document.body.classList.add("fade-in");
    atualizarContador();
});
