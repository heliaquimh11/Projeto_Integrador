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
function addCarrinho(nome, preco, img, extra = {}) {

    preco = Number(preco);
    let carrinho = obterCarrinho();

    const id = extra.id || Date.now();
    const tamanho = extra.tamanho || null;

    // procurar item igual (mesmo id + tamanho)
    const index = carrinho.findIndex(item => 
        item.id === id && item.tamanho === tamanho
    );

    if (index !== -1) {
        // já existe → aumentar quantidade
        carrinho[index].qtd = (carrinho[index].qtd || 1) + 1;
    } else {
        // novo item → começar com qtd = 1
        carrinho.push({
            id,
            nome,
            preco,
            img,
            tamanho,
            qtd: 1
        });
    }

    salvarCarrinho(carrinho);
    atualizarContador();

    alert("Produto adicionado ao carrinho!");
}


/* Expor funções para o HTML */
window.addCarrinho = addCarrinho;
window.atualizarContador = atualizarContador;
window.atualizarCarrinho = atualizarCarrinho;
