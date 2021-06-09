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
        <meta name="description" content="My Midia List">
        <meta name="author" content="Otávio Monteiro Rossoni">
        <title>Inserção de Mídia com Erro</title>
    </head>

    <body>
        <!--Parte do Sistema destinada a exibir quais erros foram constatados-->
        <h3>ERROS!</h3>
        <?php
            if(isset($_SESSION['erros'])){
                $erros = array();
                $erros = unserialize($_SESSION['erros']);

                foreach ($erros as $e){
                    echo '<br />'.$e;
                }
                unset($_SESSION['erros']);
            }
        ?>
    </body>
</html>    