<?php
require_once '../core/conexao.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$id_cliente = $_SESSION['id_cliente'] ?? null;

$endereco    = $_POST['endereco'] ?? '';
$numero      = $_POST['numero'] ?? '';
$complemento = $_POST['complemento'] ?? '';
$cep         = $_POST['cep'] ?? '';
$cidade      = $_POST['cidade'] ?? '';
$estado      = $_POST['estado'] ?? '';

class CadastrarEndereco {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function insert($id_cliente, $endereco, $numero, $complemento, $cidade, $estado, $cep) {

        if (empty($id_cliente)) {
            $_SESSION['erro'] = "Sessão expirada. Recomece o cadastro.";
            header("Location: ../views/criar-conta.php");
            exit;
        }

        if (empty($endereco) || empty($numero) || empty($cep) || empty($cidade) || empty($estado)) {
            $_SESSION['erro'] = "Preencha todos os campos obrigatórios.";
            header("Location: ../views/criar-endereco.php");
            exit;
        }

        try {
            $sql = "INSERT INTO endereco (id_cliente, endereco, numero, complemento, cidade, estado, cep)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);

            if ($stmt->execute([$id_cliente, $endereco, $numero, $complemento, $cidade, $estado, $cep])) {

                $_SESSION['sucesso'] = "Endereço salvo!";
                $_SESSION['id_endereco'] = $this->pdo->lastInsertId();

                header("Location: ../views/log.php");
                exit;

            } else {
                $_SESSION['erro'] = "Erro ao salvar endereço.";
                header("Location: ../views/criar-endereco.php");
                exit;
            }
        } 
        catch (PDOException $e) {
            $_SESSION['erro'] = "Erro PDO: " . $e->getMessage();
            header("Location: ../views/criar-endereco.php");
            exit;
        }
    }
}

$cadastro = new CadastrarEndereco($pdo);

// AQUI O ERRO: você estava usando $id_cliente_sessao (variável inexistente)
$cadastro->insert($id_cliente, $endereco, $numero, $complemento, $cidade, $estado, $cep);
