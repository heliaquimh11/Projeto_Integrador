<?php 
require_once __DIR__ . '/../core/conexao.php';
class Ccrud{
private $pdo;
public function __construct($pdo){
        $this->pdo = $pdo;
}
public function inserir($nome,$endereco,$cep,$numero){
    $sql = 'INSERT INTO clientes(Nome,endereco,cep,numero) values(?,?,?,?)';
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$nome, $endereco, $cep, $numero]);
}
}
?>