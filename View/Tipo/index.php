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
        <title>Tipo de Mídia</title>
    </head>

    <body>
        <fieldset>
            <legend> Tipo </legend>
            <li><a href="./Tipo/create.php">Cadastrar</a></li>
            <li><a href="../../Controller/TipoController.php?operation=consultar">Consultar</a></li>
        </fieldset>        
    </body>
</html>