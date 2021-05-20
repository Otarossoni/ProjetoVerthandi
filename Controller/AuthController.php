<?php
    session_start();
    include '../Model/user.php';
    include '../Dao/UserDAO.php';

    function login(){
        $email = $_POST['email'];    
        $senha = $_POST['senha'];

        $userDao = new UserDAO();
        $user = $userDao->find($email, $senha);

        if($user) {
            $_SESSION['user'] = serialize($user);
            header("location:../View/app.php");
        } else {
            unset($_SESSION['user']);
            header("location:../index.php");
        }
    }

    function logout(){
        unset($_SESSION['user']);
        header("location:../index.php");
    }

    $operacao = $_GET['operation'];
    if (isset($operacao)) {
        switch($operacao) {
            case 'login':
                login();
                break;
            case 'logout':
                logout();
                break;    
        }
    }
?>