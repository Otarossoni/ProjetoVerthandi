<?php
    include '../Persistence/ConnectionDB.php';

    class MidiaDAO {
        private $connection = null;

        public function __construct(){
            $this->connection = ConnectionDB::getInstance();
        }

        public function create($midia){
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO midia (id, nome, tipo, autor, status, dataTermino, avaliacao, nota, usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
                );

                $statement->bindValue(1, $midia->id);
                $statement->bindValue(2, $midia->nome);
                $statement->bindValue(3, $midia->tipo);
                $statement->bindValue(4, $midia->autor);
                $statement->bindValue(5, $midia->status);
                $statement->bindValue(6, $midia->dataTermino);
                $statement->bindValue(7, $midia->avaliacao);
                $statement->bindValue(8, $midia->nota);
                $statement->bindValue(9, $midia->usuario);

                $statement->execute();

                // var_dump($statement); die();

                $this->closeConnection();
            } catch (PDOException $e) {
                echo "Ocorreram erros ao inserir uma nova midia!";
                echo $e;
            }
        }

        public function search() {
            try {
                $statement = $this->connection->prepare("SELECT * FROM Midia");
                $statement->execute();
                $dados = $statement->fetchAll();
                
                return $dados;
            } catch (PDOException $e){
                echo "Ocorreram erros ao buscar as Mídias!";
                echo $e;
            }
        }

        public function searchAutores() {
            try {
                $statement = $this->connection->prepare("SELECT * FROM Autor");
                $statement->execute();
                $dados = $statement->fetchAll();
                
                return $dados;
            } catch (PDOException $e){
                echo "Ocorreram erros ao buscar os Autores!";
                echo $e;
            }
        }

        public function searchTipos() {
            try {
                $statement = $this->connection->prepare("SELECT * FROM Tipo");
                $statement->execute();
                $dados = $statement->fetchAll();
                
                return $dados;
            } catch (PDOException $e){
                echo "Ocorreram erros ao buscar os Tipos de Mídia!";
                echo $e;
            }
        }

        public function closeConnection() {
            //Encerra a conexão com o Banco de Dados
            $this->connection = null;
        }

        public function delete($id){
            try {
                $statement = $this->connection->prepare("DELETE FROM Midia WHERE id = ?");
                $statement->bindValue(1, $id);
                $statement->execute();

                $this->closeConnection();
            } catch(PDOException $e) {
                echo "Ocorreram erros ao deletar a mídia!";
                echo $e;
            }
        }
    }
?>