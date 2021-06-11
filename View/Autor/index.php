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
        <title>Autor</title>
    </head>

    <body>
        <fieldset>
            <legend> Autor </legend>
            <li><a href="./Autor/create.php">Cadastrar</a></li>
            <li><a href="../../Controller/AutorController.php?operation=consultar">Consultar</a></li>
        </fieldset>    
    </body>
</html>
