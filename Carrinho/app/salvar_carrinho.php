<?php
session_start();

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['carrinho'])) {
    $_SESSION['carrinho'] = $data['carrinho'];
}

echo json_encode(["ok" => true]);
exit;

?>
