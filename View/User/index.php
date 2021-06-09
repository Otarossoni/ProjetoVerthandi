<?php
    session_start();

    $user = unserialize($_SESSION['user']);
    if(!$user)
    header("location:../../index.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Usuários</title>
    </head>

    <body>
        <fieldset>
            <legend> Usuário </legend>
            <li><a href="create.php">Cadastrar</a></li>
            <li><a href="../../Controller/UserController.php?operation=consultar">Consultar</a></li>
        </fieldset>        
    </body>
</html>