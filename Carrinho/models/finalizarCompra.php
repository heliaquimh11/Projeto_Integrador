<?php 
class finalizarCompra{
private $pdo;
public function __construct($pdo){
        $this->pdo = $pdo;

}
    public function inserir($nome,$endereco,$cep,$numero){
        $sql = 'INSERT INTO pedido(id_cliente,id_produto,quantidade,total) values(?,?,?,?)';
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome,$endereco,$cep,$numero]);
    }
}
?>