<?php 
session_start();
require_once '../core/conexao.php';
$total = $_SESSION['total_compra'] ?? 0.00;
$id_cliente_sessao = $_SESSION['id_cliente'] ?? null; 
$endereco_session  = $_SESSION['endereco'] ?? '';
$cep_session  = $_SESSION['cep'] ?? '';
$numero_session  = $_SESSION['numero'] ?? '';
$id_cartao_session  = $_SESSION['id_cartao'] ?? '';
$frete = "00.00";
class finalizar
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function insert($id_cliente_sessao, $endereco, $numero, $cep,$id_cartao_session, $frete,$total){
        
        if (empty($id_cliente_sessao)) {
            $_SESSION['erro'] = "Sessão expirada. Recomece o cadastro.";
            header("Location: ../views/log.php");
            exit;
        }

        if (empty($endereco) || empty($numero) || empty($cep)) {
            $_SESSION['erro'] = "Preencha todos os campos obrigatórios.";
            header("Location: ../views/finalizar.php");
            exit;
        }

        try{
           $sql = "INSERT INTO TABLE pedido(,endereco, numero, cep, id_cliente, id_cartao, frete, total) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);

            if($stmt->execute([$endereco, $numero, $cep, $id_cliente_sessao,$id_cartao_session,$frete, $total])){   
                $_SESSION['sucesso'] = "Endereço atualizado!";
                header("Location: ../views/log.php"); 
                exit; 
            } else {
                $_SESSION['erro'] = "Erro ao atualizar endereço.";
                header("Location: ../views/finalizar.php");
                exit;
            }
        }
        catch (PDOException $e){
            $_SESSION['erro'] = "Erro PDO: " . $e->getMessage(); 
            header("Location: ../views/finalizar.php");
            exit;
        }


    }

    
}


?>