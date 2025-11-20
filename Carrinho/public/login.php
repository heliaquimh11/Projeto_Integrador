<?php

class login{

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function select($email, $senha) {
        $sql = "SELECT email,senha FROM cliente(nome,email,senha) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$email, $senha]);
    }

}
?>
