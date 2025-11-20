<?php 

class produto{

private int $id;
private string $nome;
private int $preco;
private int $quantidade;

public function setId(int $id){

    $this->id = $id;

}

public function setPreco(int $preco){

    $this->preco = $preco;
}

public function setNome(string $nome){
    $this->nome = $nome;
    
}

public function setQuantidade(int $quantidade){
    $this->quantidade = $quantidade;
    
}


public function getId(){
return $this->id;

}

public function getPreco(){
return $this->preco;
}
public function getNome(){
return $this->nome;
}
public function getQuantidade(){
return $this->quantidade;
}
}
?>