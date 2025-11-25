<?php
require_once __DIR__ . '/../core/conexao.php';
class cadastrar{

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function inserir($nome, $email, $senha) {
        $sql = "INSERT INTO cliente(nome, email,senha) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$nome, $email, $senha]);
    }

}
?>
