<?php 
require_once __DIR__ . '/../core/sessao.php';

class MetodoPagamento {

    private $pdo;
    public $aprovado = false;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
     
    public function select($numero, $validade, $cvv) {
        $sql = "SELECT * FROM cartao WHERE numero = ? AND validade = ? AND cvv = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$numero, $validade, $cvv]);
       
        if($stmt->rowCount() > 0){
            $this->aprovado = true;
        } else {
            $this->aprovado = false;
        }

        return $this->aprovado;
    }
}

?>
