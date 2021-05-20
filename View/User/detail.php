<?php
    session_start();
?>

<DOCTYPE html>
<html>
    <head>
        <title>Inserção de Usuário com Sucesso</title>
    </head>

    <body>
        <!--Parte do Sistema destinada a exibir o resultado final da inserção-->
        <h3>Resultado:</h3>
        <?php
            if(isset($_SESSION['nome'])){
                echo '<br> Usuário: '.$_SESSION['nome'].' inserido(a) com sucesso!';
                
                unset($_SESSION['nome']);
            }
        ?>
    </body>
</html>    