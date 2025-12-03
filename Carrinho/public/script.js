/* ===================== script.js ===================== */
/* contém: bancoProdutos, abrirProduto (via event listeners), inicialização produto */
/* NÃO declara consts duplicadas no escopo global; usa window.* apenas quando necessário */

window.LS_PRODUTOS = window.LS_PRODUTOS || "produtos";
window.LS_PRODUTO_SELECIONADO = window.LS_PRODUTO_SELECIONADO || "produtoSelecionado";

/* banco de produtos (exemplo) */
window.bancoProdutos = {
  jersey: {
    id: "jersey",
    nome: "Jersey Barça - Unissex",
    preco: "R$ 129.90",
    frente: "../public/img/jersey- frente.webp" // opcional
  },
  hoodie: {
    id: "hoodie",
    nome: "Camiseta Bag - Unissex",
    preco: "R$ 109.90",
    frente: "../public/img/hoodie-frente.webp"
  },
  calca: {
    id: "calca",
    nome: "Calça Baggy TakeOff - Unissex",
    preco: "R$ 199.90",
    frente: "../public/img/calca-frente.webp"
  }
};

/* função para abrir produto (usada internamente) */
function abrirProdutoId(id) {
  if (!id) {
    console.error("abrirProdutoId: id inválido", id);
    return;
  }
  localStorage.setItem(window.LS_PRODUTO_SELECIONADO, id);
  // caminho relativo: assume produto.php na mesma pasta de catalogo.php
  window.location.href = "produto.php";
}

/* expor por compatibilidade (se ainda tiver onclick inline em algum lugar) */
window.abrirProduto = abrirProdutoId;

/* inicializa listeners no catálogo e na página de produto */
function inicializarCatalogo() {
  // buttons com data-id
  document.querySelectorAll(".btn-ver-prod").forEach(btn => {
    btn.addEventListener("click", (e) => {
      const id = btn.dataset.id;
      abrirProdutoId(id);
    });
  });
}

function inicializarPaginaProduto() {
  const nomeEl = document.getElementById("prod-nome");
  if (!nomeEl) return; // não é a página produto

  const id = localStorage.getItem(window.LS_PRODUTO_SELECIONADO);
  if (!id || !window.bancoProdutos[id]) {
    console.warn("Produto não encontrado, voltando ao catálogo.");
    window.location.href = "catalogo.php";
    return;
  }

  const p = window.bancoProdutos[id];
  nomeEl.innerText = p.nome || "";
  const precoEl = document.getElementById("prod-preco");
  if (precoEl) precoEl.innerText = p.preco || "";

  // imagens (se houver)
  const img1 = document.getElementById("img1");
  const img2 = document.getElementById("img2");
  if (img1 && p.frente) img1.src = p.frente;
  if (img2 && p.verso) img2.src = p.verso || p.frente || "";

  // botão adicionar ao carrinho (usa addCarrinho do carrinho.js)
  const botao = document.querySelector(".btn-cart");
  const selectTamanho = document.querySelector(".tamanho-select");
  if (botao) {
    botao.addEventListener("click", () => {
      const tamanho = selectTamanho ? selectTamanho.value : '';
      if (!tamanho || tamanho.toLowerCase() === "selecione") {
        alert("Escolha um tamanho antes de adicionar ao carrinho!");
        return;
      }
      const precoRaw = (p.preco || "").replace(/[^\d,.-]/g, "").replace(",", ".");
      const preco = parseFloat(precoRaw) || 0;
      if (typeof window.addCarrinho === "function") {
        window.addCarrinho(p.nome, preco, p.frente || "", { tamanho, id: p.id });
      } else {
        console.error("addCarrinho não encontrada. Verifique carrinho.js");
      }
    });
  }
}

/* DOMContentLoaded: inicializa catálogo e produto conforme a página */
document.addEventListener("DOMContentLoaded", () => {
  // atualiza contador (se carrinho.js já estiver carregado)
  if (typeof window.atualizarContador === "function") {
    window.atualizarContador();
  }

  inicializarCatalogo();
  inicializarPaginaProduto();
});
/* ================== FUNÇÕES PARA O CARRINHO NO HTML ================== */

function carregarCarrinho() {
    const carrinho = obterCarrinho();
    const container = document.getElementById("carrinho-container");

    if (!container) return;

    if (carrinho.length === 0) {
        container.innerHTML = "<p style='color:white;'>Seu carrinho está vazio.</p>";
        return;
    }

    let html = "";

    carrinho.forEach(item => {
        html += `
            <div style="
                display:flex;
                align-items:center;
                background:#111;
                padding:10px;
                border-radius:10px;
                margin-bottom:10px;
            ">
                <img src="${item.img}" style="width:80px; border-radius:8px;">
                <div style="margin-left:15px; color:white;">
                    <h3>${item.nome}</h3>
                    <p>Tamanho: ${item.tamanho || "Único"}</p>
                    <p>Preço: R$ ${item.preco.toFixed(2)}</p>
                </div>
            </div>
        `;
    });

    container.innerHTML = html;
}

function calcularResumo() {
    const carrinho = obterCarrinho();

    let subtotal = 0;
    carrinho.forEach(item => subtotal += item.preco);

    document.getElementById("subtotal").textContent = 
        "Subtotal: R$ " + subtotal.toFixed(2);

    document.getElementById("total").textContent = 
        "Total: R$ " + subtotal.toFixed(2);
}
