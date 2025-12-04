<?php  
session_start();
require_once  '../core/conexao.php';

$id_cliente = $_SESSION['id_cliente'] ?? null;
$numero     = $_POST['numero']     ?? null;
$validade   = $_POST['validade']   ?? null;
$cvv        = $_POST['cvv']        ?? null;

class cadastrar_cartao
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    } 

    public function insert($id_cliente, $numero, $validade, $cvv){

        if(empty($id_cliente)){
            $_SESSION['erro'] = "Sessão expirada. Recomece o cadastro.";
            header("Location: ../views/finalizar.php");
            exit;
        }

        if(empty($numero) || empty($validade) || empty($cvv)){
            $_SESSION['erro'] = "Preencha todos os campos obrigatórios.";
            header("Location: ../views/finalizar.php");
            exit;
        }

        try {
            $sql = "INSERT INTO cartao(id_cliente, numero, validade, cvv) 
                    VALUES (:id_cliente, :numero, :validade, :cvv)";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindValue(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $stmt->bindValue(':numero', $numero, PDO::PARAM_INT);
            $stmt->bindValue(':validade', $validade, PDO::PARAM_INT);
            $stmt->bindValue(':cvv', $cvv, PDO::PARAM_INT);

            if($stmt->execute()){

                // CORREÇÃO IMPORTANTE
                $_SESSION['id_cartao'] = $this->pdo->lastInsertId();  

                // VOLTAR PARA A PÁGINA FINALIZAR
                header("Location: ../views/finalizar.php"); 
                exit; 
            } else {

                echo "<pre style='color: yellow; background:black; padding:10px;'>";
                echo "❌ execute() retornou FALSE\n\n";
                echo "📌 errorInfo():\n";
                print_r($stmt->errorInfo());
                echo "\n📌 Dados enviados:\n";
                var_dump(compact('id_cliente','numero','validade','cvv'));
                echo "</pre>";
                exit;
            }

        } catch (PDOException $e) {
            echo "<pre style='color:red;font-size:16px;'>";
            echo "❌ ERRO PDO: " . $e->getMessage();
            echo "\nArquivo: " . $e->getFile();
            echo "\nLinha: " . $e->getLine();
            echo "</pre>";
            exit;
        }
    }
}

$cadastro = new cadastrar_cartao($pdo);
$cadastro->insert($id_cliente, $numero, $validade, $cvv);
