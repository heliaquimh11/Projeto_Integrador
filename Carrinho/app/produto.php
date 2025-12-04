<?php
session_start();
require_once '../core/conexao.php';
class Produto {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Busca o ID e o PREÇO do primeiro produto na tabela (apenas um).
     * Salva ID e PREÇO na sessão e retorna o ID do produto.
     * @return int|false Retorna o ID do produto (inteiro) ou false em caso de erro/não encontrado.
     */
    public function selectOnlyOneId(): int|false {
        try {
            // PROBLEMA 1 CORRIGIDO: Removidas as linhas duplicadas/conflitantes do SQL
            // Seleciona id_produto e preco, e limita a busca a 1 registro.
            $sql = "SELECT id_produto, preco FROM produto LIMIT 1";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            // fetchColumn(0) só pega a primeira coluna (id_produto). 
            // Para pegar id_produto E preco, precisamos de fetch().
            
            // Pega todo o primeiro registro como um array associativo
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($produto) {
                // Atribuição das variáveis a partir do array $produto
                $id_produto = $produto['id_produto'];
                $preco = $produto['preco']; 

                // Converte para os tipos corretos (boa prática)
                // PROBLEMA 2 CORRIGIDO: Agora $preco está definido.
                $id_produto_int = (int) $id_produto;
                $preco_float = (float) $preco;
                
                // Salva ambos na sessão
                $_SESSION['_id_produto'] = $id_produto_int;
                $_SESSION['preco'] = $preco_float;

                // Retorna APENAS o ID único (um número inteiro), conforme o nome do método sugere
                return $id_produto_int; 
            }

            return false;

        } catch (PDOException $e) {
            error_log("Erro ao selecionar ID único e preço do produto: " . $e->getMessage());
            echo "Ocorreu um erro ao carregar os dados do produto.";
            return false;
        }
    }
}


$produto = new Produto($pdo);
$id_retornado = $produto->selectOnlyOneId(); 
?>