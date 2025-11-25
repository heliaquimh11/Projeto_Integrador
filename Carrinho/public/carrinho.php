<?php
class Carrinho {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }
    }

    // Adicionar produto
    public function adicionar(array $produto) {
        $id = $produto['id'];

        if (!isset($_SESSION['carrinho'][$id])) {
            // Primeira vez
            $produto['quantidade'] = 1;
            $_SESSION['carrinho'][$id] = $produto;
        } else {
            // Já está no carrinho → aumenta
            $_SESSION['carrinho'][$id]['quantidade']++;
        }
    }

    // Remover 1 unidade
    public function remover($id) {
        if (isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id]['quantidade']--;

            if ($_SESSION['carrinho'][$id]['quantidade'] <= 0) {
                unset($_SESSION['carrinho'][$id]);
            }
        }
    }

    // Total SEM desconto
    public function getTotal() {
        $total = 0;

        foreach ($_SESSION['carrinho'] as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }

        return $total;
    }

    // Total COM desconto
    public function getTotalComDesconto($valor, $tipo) {
        $desconto = new Desconto();
        return $desconto->calcularDesconto($this->getTotal(), $valor, $tipo);
    }

    public function getItens() {
        return $_SESSION['carrinho'];
    }
}
?>
