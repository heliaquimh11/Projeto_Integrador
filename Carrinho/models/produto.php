<?php 
require_once  '../core/conexao.php';
$acessabanco = new Produto($pdo);
class Produto {
    private $pdo;
    public function __construct($pdo){ 
        $this->pdo = $pdo;
    }

    public function select($id){
        $sql = "SELECT * FROM produto WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


?>