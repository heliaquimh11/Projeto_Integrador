<?php
require_once '../core/conexao.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
session_set_cookie_params([
    'lifetime' => 0,
    'httponly' => true,
    'secure' => false
]);
$nome  = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

class cadastro_cliente
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function inserir($nome, $email, $senha)
    {
        if (empty($nome) || empty($email) || empty($senha)) {
            $_SESSION['erro'] = "Preencha todos os campos.";
            header("Location: ../views/criar-conta.php");
            exit;
        }

        try {
            // verificar e-mail duplicado
            $sql_check = "SELECT email FROM cliente WHERE email = ?";
            $stmt_check = $this->pdo->prepare($sql_check);
            $stmt_check->execute([$email]);

            if ($stmt_check->rowCount() > 0) {
                $_SESSION['erro_login'] = "Usuário já existe! O email $email já está cadastrado.";
                header("Location: ../views/criar-conta.php");
                exit;
            }

            // inserir novo usuário
            $sql = 'INSERT INTO cliente (nome, email, senha) VALUES (?, ?, ?)';
            $stmt = $this->pdo->prepare($sql);

            if ($stmt->execute([$nome, $email, $senha])) {

                // salvar ID
                $_SESSION['id_cliente'] = $this->pdo->lastInsertId();
                $_SESSION['email']      = $email;
                $_SESSION['logado']     = true;

                // criar sessão do carrinho vazia
                $_SESSION['carrinho'] = [];

                $_SESSION['sucesso'] = "Conta criada com sucesso!";

                header("Location: ../views/criar-endereco.php?#endereco");
                exit;
            }

            // erro geral
            $_SESSION['erro'] = "Erro ao cadastrar usuário.";
            header("Location: ../views/criar-conta.php");
            exit;

        } catch (PDOException $e) {
            $_SESSION['erro'] = "Erro no servidor.";
            header("Location: ../views/criar-conta.php");
            exit;
        }
    }
}

$cadastro = new cadastro_cliente($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cadastro->inserir($nome, $email, $senha);
} else {
    header("Location: ../views/criar-conta.php");
    exit;
}
