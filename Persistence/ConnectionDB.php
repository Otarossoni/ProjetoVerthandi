<?php
    class ConnectionDB extends PDO {
        private static $instance = null;

        public function __construct($dsn, $usuario, $senha){
            parent::__construct($dsn, $usuario, $senha);
        }

        public static function getInstance(){
            if (!isset(self::$instance)) {
                try{
                    //Cria uma conexão e retorna a instância dela
                    self::$instance = new ConnectionDB(
                        "pgsql:dbname=verthandi_php;host=localhost",
                        "postgres",
                        "masterkey"
                    );
                    echo "Conexão ao Banco de Dados efetuado com sucesso!";
                } catch (Exception $e) {
                    echo "Erro ao tentar conectar ao Banco de Dados!";
                    echo $e;
                    die();
                    exit();
                }
            }
            return self::$instance;
        }
    }
?>