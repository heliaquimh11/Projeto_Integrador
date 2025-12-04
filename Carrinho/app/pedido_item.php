<?php 
session_start();
require_once '../core/conexao.php';

$id_pedido = $_SESSION['id_pedido'] ?? null;
$carrinho_itens = $_SESSION['carrinho'] ?? [];

if (!$id_pedido || count($carrinho_itens) === 0) {
    $_SESSION['erro'] = "Erro: pedido ou carrinho ausente.";
    header("Location: ../views/finalizar.php");
    exit;
}

class ProdutoItem {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    
    public function insert_pedido_item($id_pedido, array $carrinho) {
        
        $sql = "INSERT INTO pedido_item (id_pedido, id_produto, quantidade)
                VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);

        try {

            foreach ($carrinho as $item) {
                $id_produto = $item['id'] ?? 0;
                $qtd = $item['qtd'] ?? 1;

                if ($id_produto <= 0) continue;

                if (!$stmt->execute([$id_pedido, $id_produto, $qtd])) {
                    $_SESSION['erro'] = "Erro ao inserir item do pedido.";
                    header("Location: ../views/finalizar.php");
                    exit;
                }
            }

            // Tudo certo → limpa carrinho
            unset($_SESSION['carrinho']);

            // Redireciona APENAS AQUI, UMA VEZ
            header("Location: ../views/confirmacao.php");
            exit;

        } catch (PDOException $e) {
            $_SESSION['erro'] = "Erro interno (Itens): " . $e->getMessage();
            header("Location: ../views/finalizar.php");
            exit;
        }
    }
}

$produto_item = new ProdutoItem($pdo);
$produto_item->insert_pedido_item($id_pedido, $carrinho_itens);
