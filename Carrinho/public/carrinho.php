<?php 
class Cart {

    public function comprar(Produto $produto) {
        $noCarrinho = false;
        $this->setTotal($produto);

        if (count($this->getCart()) > 0) {
            foreach ($this->getCart() as $produtonocarrinho) {
                if ($produtonocarrinho->getId() === $produto->getId()) {
                    $quantidade = $produtonocarrinho->getQuantidade() + $produto->getQuantidade();
                    $produtonocarrinho->setQuantidade($quantidade);
                    $noCarrinho = true;
                    break;
                }
            }

            if (!$noCarrinho) {
                $this->setGravarCarrinho($produto);
            }
        }
    }

    private function setGravarCarrinho(Produto $produto) {
        $_SESSION['cart']['produtos'][]= $produto;
    }
    private function setTotal(produto $produto){
       $_SESSION['cart']['total'] += $produto->getPreco()* $produto->getQuantidade();
    }

    public function remover() {
    
    }

    public function getCart() {
        return $_SESSION['cart']['produtos']?? [];
    }
}
?>
