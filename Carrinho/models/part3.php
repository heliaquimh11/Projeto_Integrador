<?php  
require_once  '../core/conexao.php';
class cadastrar_cartao
{
private PDO $pdo;
   public function __construct(PDO $pdo){
       $this->pdo = $pdo;
   } 
   public function insert($numero,$validade,$cvv){
    $sql = "INSERT INTO cartao(numero,validade,cvv) values(?,?,?)";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$numero,$validade,$cvv]);
}
}
?>