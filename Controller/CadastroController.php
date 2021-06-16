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

                $user->id = $_POST['id'];
                $user->nome = $_POST['nome'];
                $user->email = $_POST['email'];
                $user->senha = $_POST['senha'];

                $userDao = new UserDAO();
                $userDao->create($user);

                //Echo de Usuário inserida com sucesso usando Session.
                $_SESSION['nome'] = $user->nome;
                header("location:../View/Cadastro/detail.php");
            } else {
                //Echo de erro ao inserir nova Usuário usando Session.
                $err = serialize($erros);
                $_SESSION['erros'] = $err;
                header("location:../View/Cadastro/error.php");
        } 
    }

    $operacao = $_GET['operation'];
    if (isset($operacao)) {
        switch($operacao) {
            case 'cadastrar':
                criar();
                break;           
        }
    }  
?>