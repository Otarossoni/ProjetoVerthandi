<?php
    //Objeto Mídia 
    class Midia {
        var $id;
        var $nome;
        var $tipo;
        var $autor;
        var $status;
        var $dataTermino;
        var $avaliacao;
        var $nota;
        var $usuario;

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