<?php
require_once __DIR__ . '/../core/sessao.php';
require_once __DIR__ . '/../models/Desconto.php';
require_once __DIR__ . '/../models/copum.php';

class Carrinho {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }
    }

    public function getTotal() {
        $total = 0;

        foreach ($_SESSION['carrinho'] as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }

        return $total;
    }

    public function getTotalComDesconto($valor, $tipo) {
        $desconto = new Desconto();
        return $desconto->calcularDesconto($this->getTotal(), $valor, $tipo);
    }

    public function getItens() {
        return $_SESSION['carrinho'];
    }
}
?>
