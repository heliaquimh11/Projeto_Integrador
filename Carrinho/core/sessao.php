<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Garantir que o carrinho exista
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}
?>