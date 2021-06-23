<?php
    //Objeto Tipo 
    class Tipo {
        var $idTipo;
        var $nome;
        var $descricao;
        var $usuario;

        //Método Contrutor do objeto Tipo
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