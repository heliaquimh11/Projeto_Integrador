<?php 
require_once __DIR__ . '/../core/sessao.php';
class remove{
    public function remover($id) {
        if (isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id]['quantidade']--;

            if ($_SESSION['carrinho'][$id]['quantidade'] <= 0) {
                unset($_SESSION['carrinho'][$id]);
            }
        }
    }

}
?>