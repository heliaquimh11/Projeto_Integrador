<?php
session_start();
require_once '../core/conexao.php';
$id_cliente_sessao = $_SESSION['id_cliente'] ?? null;
$id_endereco  = $_SESSION['id_endereco'] ?? '';
$desconto = '00.00';
$frete = "00.00";
$total = $_SESSION['total_compra'] ?? 0.00;
$status = "1";
$id_cartao_session = $_SESSION['id_cartao'] ?? null;


class Finalizar
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function insert($id_endereco, $id_cliente, $id_cartao, $frete, $total, $status, $desconto)
    {
        if (empty($id_cliente)) {
            $_SESSION['erro'] = "Sessão expirada.";
            header("Location: ../views/log.php");
            exit;
        }

        if (empty($endereco) || empty($numero) || empty($cep)) {
            $_SESSION['erro'] = "Preencha todos os campos.";
            header("Location: ../views/finalizar.php");
            exit;
        }

        try {
            $sql = "INSERT INTO pedido 
                (id_endereco, id_cliente, id_cartao, frete, total, status, desconto) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $this->pdo->prepare($sql);

            $parametros = [$id_endereco,$id_cliente, $id_cartao, $frete, $total, $status, $desconto];

            if ($stmt->execute($parametros)) {

                $_SESSION['id_pedido'] = $this->pdo->lastInsertId();

                header("Location: pedido_item.php");
                exit;

            } else {
                $_SESSION['erro'] = "Erro ao registrar o pedido.";
                header("Location: ../views/finalizar.php");
                exit;
            }
        } catch (PDOException $e) {
            $_SESSION['erro'] = "Erro interno: " . $e->getMessage();
            header("Location: ../views/finalizar.php");
            exit;
        }
    }
}

// Execução
$finalizar = new Finalizar($pdo);
$finalizar->insert(
    $endereco_session,
    $id_cliente_sessao,
    $id_cartao_session,
    $frete,
    $total,
    $status,
    $desconto
);
?>