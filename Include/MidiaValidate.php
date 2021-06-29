<?php
//Parte do Sistema dedicado para a validação de certos valores
class MidiaValidate {  
    //Função responsável por validar apenas notas maiores que 0
    public static function minNota($nota){
        if($nota >= 0){
            return true;
        } else{
            return false;
        }
    }

    //Função responsável por validar apenas notas menores ou iguais a 10
    public static function maxNota($nota){
        if($nota <= 10){
            return true;
        } else{
            return false;
        }
    }
}
?>