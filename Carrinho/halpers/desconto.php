<?php 
class desconto{
        public function calcularDesconto($total,$valor,$tipo){
            if($tipo === 'porcentagem'){
                return $total - ($total * ($valor / 100));
            } else if($tipo === 'fixo'){
                return $total - $valor;
            }
        }
}
?>