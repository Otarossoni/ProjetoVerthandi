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
                    "INSERT INTO midia (id, nome, tipo, status, dataTermino, avaliacao, nota) VALUES (?, ?, ?, ?, ?, ?, ?)"
                );

                $statement->bindValue(1, $midia->id);
                $statement->bindValue(2, $midia->nome);
                $statement->bindValue(3, $midia->tipo);
                $statement->bindValue(4, $midia->status);
                $statement->bindValue(5, $midia->dataTermino);
                $statement->bindValue(6, $midia->avaliacao);
                $statement->bindValue(7, $midia->nota);

                $statement->execute();

                // var_dump($statement); die();

                //Encerra a conexão com o Banco de Dados
                $this->connection = null;
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
                $this->connection = null;
                
                return $dados;
            } catch (PDOException $e){
                echo "Ocorreram erros ao buscar as Mídias!";
                echo $e;
            }
        }

        public function delete($id){
            try {
                $statement = $this->connection->prepare("DELETE FROM Midia WHERE id = ?");
                $statement->bindValue(1, $id);
                $statement->execute();

                $this->connection = null;
            } catch(PDOException $e) {
                echo "Ocorreram erros ao deletar a mídia!";
                echo $e;
            }
        }
    }
?>