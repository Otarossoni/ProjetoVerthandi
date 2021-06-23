<?php
    include '../Persistence/ConnectionDB.php';

    class UserDAO {
        private $connection = null;

        public function __construct(){
            $this->connection = ConnectionDB::getInstance();
        }

        public function create($user){
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, md5(?))"
                );

                $statement->bindValue(1, $user->nome);
                $statement->bindValue(2, $user->email);
                $statement->bindValue(3, $user->senha);

                $statement->execute();

                // var_dump($statement); die();

                //Encerra a conexão com o Banco de Dados
                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao inserir um novo Usuário!";
                echo $e;
            }
        }

        public function search() {
            try {
                $statement = $this->connection->prepare("SELECT * FROM usuario");
                $statement->execute();
                $dados = $statement->fetchAll();
                $this->connection = null;
                
                return $dados;
            } catch (PDOException $e){
                echo "Ocorreram erros ao buscar os Usuários!";
                echo $e;
            }
        }

        public function delete($id){
            try {
                $statement = $this->connection->prepare("DELETE FROM usuario WHERE id = ?");
                $statement->bindValue(1, $id);
                $statement->execute();

                $this->connection = null;
            } catch(PDOException $e) {
                echo "Ocorreram erros ao deletar o Usuário!";
                echo $e;
            }
        }

        public function find($email, $senha){
            try {
                $statement = $this->connection->prepare("SELECT * FROM usuario WHERE email = ? and senha = md5(?)");
                $statement->bindValue(1, $email);
                $statement->bindValue(2, $senha);
                $statement->execute();
                $user = $statement->fetchAll();

                $this->connection = null;
                
                return $user;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao encontrar o usuário!";
                echo $e;
            }
        }
    }
?>