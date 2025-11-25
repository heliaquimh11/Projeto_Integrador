<?php
require_once __DIR__ . '/../core/conexao.php'; 
class Cupom {

    private PDO $pdo;
    public bool $valido = false;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function select($codigo) {

        $sql = "SELECT * FROM cupom 
                WHERE codigo = ?
                AND NOW() BETWEEN valido_de AND valido_ate"; 
                //<!-- A data de agora está entre valido_de e valido_ate?” -->

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$codigo]);

        if ($stmt->rowCount() > 0) {
            $this->valido = true;
        } else {
            $this->valido = false;
        }

        return $this->valido;
    }
}
?>
