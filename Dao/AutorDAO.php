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
                    "INSERT INTO autor (nome, descricao, tipo, usuario) VALUES (?, ?, ?, ?)"
                );

                $statement->bindValue(1, $autor->nome);
                $statement->bindValue(2, $autor->descricao);
                $statement->bindValue(3, $autor->tipo);
                $statement->bindValue(4, $autor->usuario);

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
                $user = unserialize($_SESSION['user']);
                $statement = $this->connection->prepare("SELECT * FROM Autor WHERE usuario = ?");
                $statement->bindValue(1, $user[0]['id']);

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
                $user = unserialize($_SESSION['user']);
                $statement = $this->connection->prepare("DELETE FROM Autor WHERE idAutor = ? AND usuario = ?");
                $statement->bindValue(1, $user[0]['id']);
                $statement->bindValue(2, $idAutor);
                $statement->execute();

                $this->connection = null;
            } catch(PDOException $e) {
                echo "Ocorreram erros ao deletar o Autor!";
                echo $e;
            }
        }

        public function update($autor){
            try {
                $statement = $this->connection->prepare(
                    "UPDATE autor SET nome = ?, descricao = ?, tipo = ? WHERE usuario = ? AND idautor = ?"
                );
                
                $statement->bindValue(1, $autor->nome);
                $statement->bindValue(2, $autor->descricao);
                $statement->bindValue(3, $autor->tipo);
                $statement->bindValue(4, $autor->usuario);
                $statement->bindValue(5, $autor->id);

                $statement->execute();

                // var_dump($statement); die();

                //Encerra a conexão com o Banco de Dados
                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao atualizar o autor!";
                echo $e;
            }
        }

        public function searchAutor($idAutor) {
            try {
                $user = unserialize($_SESSION['user']);
                $statement = $this->connection->prepare("SELECT * FROM Tipo WHERE usuario = ? AND idAutor = ?");
                $statement->bindValue(1, $user[0]['id']);
                $statement->bindValue(2, $idAutor);

                $statement->execute();
                $dados = $statement->fetchAll();
                $this->connection = null;
                
                return $dados;
            } catch (PDOException $e){
                echo "Ocorreram erros ao buscar o Autor!";
                echo $e;
            }
        }
    }
?>