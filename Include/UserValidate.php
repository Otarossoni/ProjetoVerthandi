<?php
//Parte do Sistema dedicado para a validação de certos valores
class UserValidate {  
    //Função responsável por validar email
    public static function testarEmail($email){
        $Sintaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
        if(preg_match($Sintaxe, $email)){
            return true;
        } else {
            return false;
        }
    }
}
?>