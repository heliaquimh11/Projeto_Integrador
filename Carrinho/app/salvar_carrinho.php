<?php
session_start();

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['carrinho'])) {
    $carrinho = $data['carrinho'];

    // 🔥 Converter os tipos DOS ITENS antes de salvar
    foreach ($carrinho as &$item) {
        // garantir que existe
        $produto = [
    'id'         => (int) $dados['id'],   // ← força ser inteiro
    'nome'       => $dados['nome'],
    'preco'      => (float) $dados['preco'],
    'img'        => $dados['img'],
    'tamanho'    => $dados['tamanho'],
    'quantidade' => (int) $dados['quantidade']
];
    }

    // salvar carrinho já convertido
    $_SESSION['carrinho'] = $carrinho;
}

echo json_encode(["ok" => true]);
exit;
