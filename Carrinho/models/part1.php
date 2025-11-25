<?php 
require_once __DIR__ . '/../core/conexao.php';
class cadastro_cliente{
private $pdo;
public function __construct($pdo){
        $this->pdo = $pdo;
}
public function inserir($nome,$email,$senha){
    $sql = 'INSERT INTO cliente(Nome,email,senha) values(?,?,?)';
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$nome,$email,$senha]);
}
}
?>