<?php 
class enderco{
private PDO $pdo;
public function __construct(PDO $pdo)
{
    $this->pdo = $pdo;
}
public function insert($numero,$complemento,$logradouro,$cidade,$bairro,$estado,$cep){
  $sql ="INSERT INTO logradouro(numero,complemento,logradouro,cidade,bairro,estado,cep)";
   $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$numero,$complemento,$logradouro,$cidade,$bairro,$estado,$cep]);
}

}


?>