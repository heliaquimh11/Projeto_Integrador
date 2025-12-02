<?php 
header('Content-Type: application/json');
require 'conecta.php';

$response = [
    'success' => false,
    'message' => ''
];

// Verifica se é POST
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $nome = $_POST['nome'] ?? '';
    $telefone = $_POST['telefone'] ?? '';

    // Verifica dados antes de inserir
    if ($nome === '' || $telefone === '') {
        $response['message'] = "Preencha todos os campos.";
        echo json_encode($response);
        exit;
    }

    try {
        $sql = "INSERT INTO usuario (nome, telefone) VALUES (:nome, :telefone)";
        $stm = $pdo->prepare($sql);

        $stm->bindValue(':nome', $nome);
        $stm->bindValue(':telefone', $telefone);

        if ($stm->execute()) {
            $response['success'] = true;
            $response['message'] = "Cadastro realizado com sucesso!";
        } else {
            $response['message'] = "Erro ao cadastrar, tente novamente.";
        }

    } catch (PDOException $e) {
        $response['message'] = "Erro no servidor: " . $e->getMessage();
    }

} else {
    $response['message'] = "Método de requisição inválido.";
}

echo json_encode($response);
exit;
