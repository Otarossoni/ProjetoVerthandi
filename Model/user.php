<?php
    //Objeto User 
    class User {
        var $id;
        var $nome;
        var $email;
        var $senha;

        //Método Contrutor do objeto User
        public function __construct(){}

        //Método para a realização de alterações nos atributos
        public function __set($propriedade, $valor){
            $this->$propriedade = $valor;
        }

        //Método para a exibição do conteúdo do atributo
        public function __get($propriedade){
            return $this-> $propriedade;
        }
    }
?>