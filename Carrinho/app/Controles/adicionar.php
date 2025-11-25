<?php 
require_once __DIR__ . '/../core/sessao.php';
class Adicionar{
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
}
?>