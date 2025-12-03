function abrirProduto(id){
    localStorage.setItem("produtoSelecionado", id);
    window.location.href = "produto.html";
}

function filtrar() {

    const categoriaFiltro = document.getElementById("filter-category").value;
    const precoFiltro = document.getElementById("filter-price").value;

    const produtos = document.querySelectorAll(".produto");

    produtos.forEach(prod => {

        const categoria = prod.getAttribute("data-category");
        const preco = parseFloat(prod.getAttribute("data-price"));

        let categoriaOk = (categoriaFiltro === "todos" || categoria === categoriaFiltro);
        let precoOk = false;

        if (precoFiltro === "todos") {
            precoOk = true;
        } 
        else if (precoFiltro === "baixo") {
            precoOk = preco <= 150;
        } 
        else if (precoFiltro === "medio") {
            precoOk = preco > 150 && preco <= 250;
        } 
        else if (precoFiltro === "alto") {
            precoOk = preco > 250;
        }

        prod.style.display = (categoriaOk && precoOk) ? "block" : "none";

        
    });

}
document.getElementById("filter-category").addEventListener("change", filtrar);
document.getElementById("filter-price").addEventListener("change", filtrar);