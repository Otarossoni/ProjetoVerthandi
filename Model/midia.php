<?php
    //Objeto Mídia 
    class Midia {
        var $nome;
        var $tipo;
        var $status;
        var $dataTermino;
        var $avaliacao;
        var $nota;

        //Método Contrutor do objeto Mídia
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