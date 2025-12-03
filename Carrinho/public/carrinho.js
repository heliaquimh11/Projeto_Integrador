/* =================== CARRINHO.JS =================== */

const LS_CARRINHO = "carrinho";

/* ============ USAR SESSIONSTORAGE EM VEZ DE LOCALSTORAGE ============ */

// obter carrinho
function obterCarrinho() {
    try {
        return JSON.parse(sessionStorage.getItem(LS_CARRINHO)) || [];
    } catch (e) {
        return [];
    }
}

// salvar carrinho
function salvarCarrinho(carrinho) {
    sessionStorage.setItem(LS_CARRINHO, JSON.stringify(carrinho));
    salvarCarrinhoNoServidor(carrinho);
}


/* =================== ADICIONAR AO CARRINHO =================== */
function addCarrinho(nome, preco, img, extra = {}) {

    preco = Number(preco);
    const carrinho = obterCarrinho();

    carrinho.push({
        id: extra.id || Date.now(),
        nome,
        preco,
        img,
        tamanho: extra.tamanho || null
    });

    salvarCarrinho(carrinho);
    atualizarContador();

    alert("Produto adicionado ao carrinho!");
}


/* =================== ATUALIZAR CONTADOR =================== */
function atualizarContador() {
    const qtd = obterCarrinho().length;
    const span = document.getElementById("cart-count");
    if (span) span.textContent = qtd;
}


/* =================== ENVIAR CARRINHO PARA O SERVIDOR =================== */
function salvarCarrinhoNoServidor(carrinho = null) {
    const itens = carrinho || obterCarrinho();

    fetch('../app/salvar_carrinho.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ carrinho: itens })
    });
}


/* =================== ATUALIZAR CARRINHO COM ITENS DO SERVIDOR =================== */
function atualizarCarrinho(itens) {
    sessionStorage.setItem('carrinho', JSON.stringify(itens));
    salvarCarrinhoNoServidor(itens);
}


/* Expor funções para o HTML */
window.addCarrinho = addCarrinho;
window.atualizarContador = atualizarContador;
window.atualizarCarrinho = atualizarCarrinho;
