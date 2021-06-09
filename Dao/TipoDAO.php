<?php
    include '../Persistence/ConnectionDB.php';

    class TipoDAO {
        private $connection = null;

        public function __construct(){
            $this->connection = ConnectionDB::getInstance();
        }

        public function create($tipo){
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO tipo (idTipo, nome, descricao) VALUES (?, ?, ?)"
                );

                $statement->bindValue(1, $tipo->idTipo);
                $statement->bindValue(2, $tipo->nome);
                $statement->bindValue(3, $tipo->descricao);

                $statement->execute();

                // var_dump($statement); die();

                //Encerra a conexão com o Banco de Dados
                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao inserir um novo tipo!";
                echo $e;
            }
        }

        public function search() {
            try {
                $statement = $this->connection->prepare("SELECT * FROM Tipo");
                $statement->execute();
                $dados = $statement->fetchAll();
                $this->connection = null;
                
                return $dados;
            } catch (PDOException $e){
                echo "Ocorreram erros ao buscar os Tipos de Mídia!";
                echo $e;
            }
        }

        public function delete($idTipo){
            try {
                $statement = $this->connection->prepare("DELETE FROM Tipo WHERE idTipo = ?");
                $statement->bindValue(1, $idTipo);
                $statement->execute();

                $this->connection = null;
            } catch(PDOException $e) {
                echo "Ocorreram erros ao deletar o tipo!";
                echo $e;
            }
        }
    }
?>