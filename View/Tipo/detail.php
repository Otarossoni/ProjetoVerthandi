<?php
    session_start();
?>

<DOCTYPE html>
<html>
    <head>
        <title>Inserção de Tipo com Sucesso</title>
    </head>

    <body>
        <!--Parte do Sistema destinada a exibir o resultado final da inserção-->
        <h3>Resultado:</h3>
        <?php
            if(isset($_SESSION['nome'])){
                echo '<br>Tipo '.$_SESSION['nome'].' inserido(a) com sucesso!';
                
                unset($_SESSION['nome']);
            }
        ?>
    </body>
</html>    