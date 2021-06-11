<?php
    //Objeto Autor
    class Autor {
        var $idAutor;
        var $nome;
        var $descricao;
        var $tipo;

        //Método Contrutor do objeto Autor
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