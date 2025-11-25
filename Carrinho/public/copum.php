<?php
class copum{
private PDO $pdo;
public $copum = false;
public function __construct(PDO $pdo){
    $this->pdo = $pdo;
}
public function select($codigo,$tipo,$valor,$valido_de,$valido_ate){ 
    $sql = "SELECT * FROM copum WHERE codigo =? AND tipo =? AND valor =? and valido_de =? and valido_ate =?";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$codigo,$tipo,$valor,$valido_de,$valido_ate]);

    if($stmt->rowCount() > 0){
        $this->copum = true;
    }
    else{
        $this->copum = false;
    }
   return $this->copum;
}
}
?>