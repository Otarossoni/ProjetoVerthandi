<?php
    //Inicia a Sessão
    session_start();

    //Área de Inclusões 
    include '../Model/user.php';
    include '../Include/UserValidate.php';
    include '../Dao/UserDAO.php';

    function criar() {
            //Array para a contabilização de erros
            $erros = array();
            
            //Estrutura de condicionamento para usar a função "testarEmail" do arquivo "Uservalidate.php"
            if(!UserValidate::testarEmail($_POST['email'])){
                $erros [] = 'E-mail inválido!';
            }

            //Estrutura de condicionamento para a inserção de umum novo usuário, que só ativa se não houverem erros na array "$erros".
            if(count($erros) == 0){
                $user = new User();

                $user->nome = $_POST['nome'];
                $user->email = $_POST['email'];
                $user->senha = $_POST['senha'];

                $userDao = new UserDAO();
                $userDao->create($user);

                //Echo de Usuário inserida com sucesso usando Session.
                $_SESSION['nome'] = $user->nome;
                header("location:../View/User/detail.php");
            } else {
                //Echo de erro ao inserir nova Usuário usando Session.
                $err = serialize($erros);
                $_SESSION['erros'] = $err;
                header("location:../View/User/error.php");
        } 
    }

    function listar() {
        $userDao = new UserDAO();
        $user = $userDao->search();

        $_SESSION['user'] = serialize($user);
        header("location:../View/User/list.php");
    }

    function atualizar() {
        echo "Em andamento!";
    }

    function deletar() {
        $id = $_GET['id'];
        if (isset($id)) {
            $userDao = new UserDAO();
            $userDao->delete($id);
            header("location:../../Controller/UserController.php?operation=consultar");
        } else {
            echo 'Usuário informado não existente!';
        }
    }

    $operacao = $_GET['operation'];
    if (isset($operacao)) {
        switch($operacao) {
            case 'cadastrar':
                if(isset($_POST['id'])){
                    criar();
                } else {
                    atualizar();
                };
                break;  
            case 'consultar':
                listar();
                break;
            case 'atualizar':
                atualizar();
                break;
            case 'deletar':
                deletar();
                break;           
        }
    }  
?>