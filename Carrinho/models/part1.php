<?php
require_once '../core/conexao.php'; // Caminho para a conexão
session_start();
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

        // Verifica se os campos estão vazios
        if (empty($nome) || empty($email) || empty($senha)) {
            $_SESSION['erro'] = "Preencha todos os campos.";
            header("Location: ../views/part1.php");
            exit;
        }

        try {
            // CHECAGEM DE USUÁRIO EXISTENTE
            $sql_check = "SELECT email FROM cliente WHERE email = ?";
            $stmt_check = $this->pdo->prepare($sql_check);
            $stmt_check->execute([$email]);

            if ($stmt_check->rowCount() > 0) {
                $_SESSION['erro'] = "Usuário já existe! O email $email já está cadastrado.";
                header("Location: ../views/part1.php?step=1");
                exit;
            }

            // ⚠️ colocar segunrança na senha em produção
            $sql = 'INSERT INTO cliente (nome, email, senha) VALUES (?, ?, ?)';
            $stmt = $this->pdo->prepare($sql);


      // ... dentro do IF de sucesso ...
            if ($stmt->execute([$nome, $email, $senha])) {
                
                // 1. Captura o ID (que você confirmou que é 19)
                $id_cliente = $this->pdo->lastInsertId();

                // 2. Coloca na sessão
                $_SESSION['id'] = $id_cliente; 
                $_SESSION['sucesso'] = "Dados pessoais cadastrados com sucesso!";

                // 🛑 O SEGREDO: FORÇA A GRAVAÇÃO NO DISCO AGORA 🛑
                session_write_close(); 

                // 3. Agora pode redirecionar seguro
                header("Location: ../views/part1.php?step=2"); 
                exit; 
            }

           /*      echo "ID GERADO: ";
                var_dump($id_cliente);
                echo "<br>SESSAO ID: ";
                $_SESSION['id'] = $id_cliente;
                var_dump($_SESSION['id']);
                die(); // Para tudo aqui
                $_SESSION['id'] = $id_cliente; */

                // NOTA: O login não é feito automaticamente, apenas o ID é armazenado para o multi-step form.
                 else {
                $_SESSION['erro'] = "Erro ao cadastrar. Tente novamente.";
                header("Location: ../views/part1.php");
                exit;
            }
        } catch (PDOException $e) {
            $_SESSION['erro'] = "Erro no servidor. Tente novamente mais tarde.";
            header("Location: ../views/part1.php");
            exit;
        }
    }
}
$cadastro = new cadastro_cliente($pdo);
$cadastro->inserir($nome, $email, $senha);
