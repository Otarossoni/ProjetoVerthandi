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
                    "INSERT INTO tipo (nome, descricao, usuario) VALUES (?, ?, ?)"
                );

                $statement->bindValue(1, $tipo->nome);
                $statement->bindValue(2, $tipo->descricao);
                $statement->bindValue(3, $tipo->usuario);

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
                $user = unserialize($_SESSION['user']);
                $statement = $this->connection->prepare("SELECT * FROM Tipo WHERE usuario = ?");
                $statement->bindValue(1, $user[0]['id']);
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
                $user = unserialize($_SESSION['user']);
                $statement = $this->connection->prepare("DELETE FROM Tipo WHERE idTipo = ? AND usuario = ?");
                $statement->bindValue(1, $idTipo);
                $statement->bindValue(2, $user[0]['id']);
                $statement->execute();

                $this->connection = null;
            } catch(PDOException $e) {
                echo "Ocorreram erros ao deletar o tipo!";
                echo $e;
            }
        }

        public function update($tipo){
            try {
                $statement = $this->connection->prepare(
                    "UPDATE tipo SET nome = ?, descricao = ? WHERE usuario = ? AND idtipo = ?"
                );
                
                $statement->bindValue(1, $tipo->nome);
                $statement->bindValue(2, $tipo->descricao);
                $statement->bindValue(3, $tipo->usuario);
                $statement->bindValue(4, $tipo->id);

                $statement->execute();

                // var_dump($statement); die();

                //Encerra a conexão com o Banco de Dados
                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao atualizar o tipo!";
                echo $e;
            }
        }

        public function searchTipo($idTipo) {
            try {
                $user = unserialize($_SESSION['user']);
                $statement = $this->connection->prepare("SELECT * FROM Tipo WHERE usuario = ? AND idTipo = ?");
                $statement->bindValue(1, $user[0]['id']);
                $statement->bindValue(2, $idTipo);

                $statement->execute();
                $dados = $statement->fetchAll();
                $this->connection = null;
                
                return $dados;
            } catch (PDOException $e){
                echo "Ocorreram erros ao buscar os Tipos de Mídia!";
                echo $e;
            }
        }
    }
?>