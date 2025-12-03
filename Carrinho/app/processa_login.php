<?php 
require_once('../core/conexao.php');
session_start();
$usuario = $_POST['email'] ?? '';
$senha   = $_POST['senha'] ?? '';

class Login { 
    private PDO $PDO;

    public function __construct(PDO $PDO){
        $this->PDO = $PDO;
    }

    public function verificar($email) { 
        try {
            $sql = "SELECT id, email, senha FROM cliente WHERE email = :email LIMIT 1"; 
            $stmt = $this->PDO->prepare($sql);
            $stmt->bindValue(':email', $email);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Erro na verificação: " . $e->getMessage();
            return false;
        }
    }
}
class verificar {

    public function autenticar($dados, $senha) {
        try {
            // CÓDIGO TEMPORÁRIO PARA TESTE (SEM HASHING)
            if ($dados && $senha === $dados['senha']) { 
                $_SESSION['logado']  = true;
                $_SESSION['id']      = $dados['id'];
                $_SESSION['email']   = $dados['email'];

                // Redirecionamento (Assumindo que este caminho está correto)
                header("Location: ../views/catalogo.php"); 
                exit;
            } else {
                $_SESSION['erro_login'] = "Usuário ou senha inválidos!";
               
                // Redirecionamento (Assumindo que este caminho está correto)
                header("Location: ../views/log.php"); 
                exit;
            }

        } catch (PDOException $e) {
            echo "Erro na autenticação: " . $e->getMessage();
        }
    }
}

// Assumindo que $pdo é definido em conexao.php
// Assumindo que $pdo é definido em conexao.php
$login = new Login($pdo); 
$dados = $login->verificar($usuario); 

/* // === ADICIONE ISTO AQUI ===
echo "Email de Teste: " . $usuario . "<br>";
echo "Dados Retornados do BD:<br>";
var_dump($dados);
die; // Para parar o script e exibir apenas o resultado da busca
// ========================== */

$auth = new verificar();
$auth->autenticar($dados, $senha);

?>