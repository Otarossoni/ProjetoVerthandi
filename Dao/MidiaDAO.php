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
                    "INSERT INTO midia (nome, tipo, autor, status, dataTermino, avaliacao, nota, usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
                );

                $statement->bindValue(1, $midia->nome);
                $statement->bindValue(2, $midia->tipo);
                $statement->bindValue(3, $midia->autor);
                $statement->bindValue(4, $midia->status);
                $statement->bindValue(5, $midia->dataTermino);
                $statement->bindValue(6, $midia->avaliacao);
                $statement->bindValue(7, $midia->nota);
                $statement->bindValue(8, $midia->usuario);

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
                $user = unserialize($_SESSION['user']);
                $statement = $this->connection->prepare("SELECT * FROM Midia WHERE usuario = ?");
                $statement->bindValue(1, $user[0]['id']);
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
                $user = unserialize($_SESSION['user']);
                $statement = $this->connection->prepare("SELECT * FROM Autor WHERE usuario = ?");
                $statement->bindValue(1, $user[0]['id']);
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
                $user = unserialize($_SESSION['user']);
                $statement = $this->connection->prepare("SELECT * FROM Tipo WHERE usuario = ?");
                $statement->bindValue(1, $user[0]['id']);
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
                $user = unserialize($_SESSION['user']);
                $statement = $this->connection->prepare("DELETE FROM Midia WHERE id = ? AND usuario = ?");
                $statement->bindValue(1, $id);
                $statement->bindValue(2, $user[0]['id']);
                $statement->execute();

                $this->closeConnection();
            } catch(PDOException $e) {
                echo "Ocorreram erros ao deletar a mídia!";
                echo $e;
            }
        }

        public function update($midia){
            try {
                $statement = $this->connection->prepare(
                    "UPDATE midia SET nome = ?, tipo = ?, autor = ?, status = ?, datatermino = ?, avaliacao = ?, nota = ? WHERE usuario = ? AND id = ?"
                );
                
                $statement->bindValue(1, $midia->nome);
                $statement->bindValue(2, $midia->tipo);
                $statement->bindValue(3, $midia->autor);
                $statement->bindValue(4, $midia->status);
                $statement->bindValue(5, $midia->dataTermino);
                $statement->bindValue(6, $midia->avaliacao);
                $statement->bindValue(7, $midia->nota);
                $statement->bindValue(8, $midia->usuario);
                $statement->bindValue(9, $midia->id);

                $statement->execute();

                // var_dump($statement); die();

                //Encerra a conexão com o Banco de Dados
                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao atualizar a mídia!";
                echo $e;
            }
        }

        public function searchMidia($idMidia) {
            try {
                $user = unserialize($_SESSION['user']);
                $statement = $this->connection->prepare("SELECT * FROM Midia WHERE usuario = ? AND id = ?");
                $statement->bindValue(1, $user[0]['id']);
                $statement->bindValue(2, $idMidia);

                $statement->execute();
                $dados = $statement->fetchAll();
                $this->connection = null;
                
                return $dados;
            } catch (PDOException $e){
                echo "Ocorreram erros ao buscar a Mídia!";
                echo $e;
            }
        }
    }
?>