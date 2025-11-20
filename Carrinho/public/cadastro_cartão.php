<?php  
class cartão
{
private PDO $pdo;
   public function __construct(PDO $pdo){
       $this->pdo = $pdo;
   } 
   public function insert($numero,$validade,$cvv){
    $sql = "INSERT INTO cartao(numero,validade,cvv) values(?,?,?)";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$numero,$validade,$cvv]);
    echo"cadastro com sucesso";
}
}
?>