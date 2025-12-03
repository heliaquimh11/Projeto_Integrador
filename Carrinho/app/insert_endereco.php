<?php 
session_start();
require_once '../core/conexao.php';
// Pega o ID que agora estará salvo (ex: 19)
$id_cliente_sessao = $_SESSION['id_cliente'] ?? null; 

$endereco    = $_POST['endereco'] ?? '';
$numero      = $_POST['numero'] ?? '';
$complemento = $_POST['complemento'] ?? '';
$cep         = $_POST['cep'] ?? '';
$cidade      = $_POST['cidade'] ?? '';
$estado      = $_POST['estado'] ?? '';

class cadastrar_enderco{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Método recebe o ID do cliente
    public function insert($id_cliente, $endereco, $numero, $complemento, $cidade, $estado, $cep){
        
        if (empty($id_cliente)) {
            $_SESSION['erro'] = "Sessão expirada. Recomece o cadastro.";
            header("Location: ../views/criar-conta.php");
            exit;
        }

        if (empty($endereco) || empty($numero) || empty($cep) || empty($cidade) || empty($estado)) {
            $_SESSION['erro'] = "Preencha todos os campos obrigatórios.";
            header("Location: ../views/criar-conta.php");
            exit;
        }

        try{
            // USE O NOME DA COLUNA EXATO DA SUA TABELA: 'id_cliente'
            $sql = "INSERT INTO endereco(id_cliente, endereco, numero, complemento, cidade, estado, cep) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);

            if($stmt->execute([$id_cliente, $endereco, $numero, $complemento, $cidade, $estado, $cep])){
                $_SESSION['sucesso'] = "Endereço salvo!";
                header("Location: ../views/log.php"); 
                exit; 
            } else {
                $_SESSION['erro'] = "Erro ao salvar endereço.";
                header("Location: ../views/criar-conta.php");
                exit;
            }
        }
        catch (PDOException $e){
            $_SESSION['erro'] = "Erro PDO: " . $e->getMessage(); 
            header("Location: ../views/criar-conta.php");
            exit;
        }
    }
}

$cadastro = new cadastrar_enderco($pdo);
// Passa a variável da sessão para o método
$cadastro->insert($id_cliente_sessao, $endereco, $numero, $complemento, $cidade, $estado, $cep);
?>