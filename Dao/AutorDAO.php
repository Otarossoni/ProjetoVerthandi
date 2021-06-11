<?php
    include '../Persistence/ConnectionDB.php';

    class AutorDAO {
        private $connection = null;

        public function __construct(){
            $this->connection = ConnectionDB::getInstance();
        }

        public function create($autor){
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO autor (idAutor, nome, descricao, tipo) VALUES (?, ?, ?, ?)"
                );

                $statement->bindValue(1, $autor->idAutor);
                $statement->bindValue(2, $autor->nome);
                $statement->bindValue(3, $autor->descricao);
                $statement->bindValue(4, $autor->tipo);

                $statement->execute();

                // var_dump($statement); die();

                //Encerra a conexão com o Banco de Dados
                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao inserir um novo Autor!";
                echo $e;
            }
        }

        public function search() {
            try {
                $statement = $this->connection->prepare("SELECT * FROM Autor");
                $statement->execute();
                $dados = $statement->fetchAll();
                $this->connection = null;
                
                return $dados;
            } catch (PDOException $e){
                echo "Ocorreram erros ao buscar os Autores!";
                echo $e;
            }
        }

        public function delete($idAutor){
            try {
                $statement = $this->connection->prepare("DELETE FROM Autor WHERE idAutor = ?");
                $statement->bindValue(1, $idAutor);
                $statement->execute();

                $this->connection = null;
            } catch(PDOException $e) {
                echo "Ocorreram erros ao deletar o Autor!";
                echo $e;
            }
        }
    }
?>