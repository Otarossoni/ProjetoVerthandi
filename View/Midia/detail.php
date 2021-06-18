<?php
    session_start();

    $user = unserialize($_SESSION['user']);
    if(!$user)
    header("location:../../index.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inserção de Mídia com Sucesso</title>
    </head>

    <body>
        <!--Parte do Sistema destinada a exibir o resultado final da inserção-->
        <h3>Resultado:</h3>
        <?php
            if(isset($_SESSION['nome']) && isset($_SESSION['tipo']) && isset($_SESSION['idusuario'])){
                echo '<br>'.$_SESSION['tipo'].' '.$_SESSION['nome'] .' inserido(a) com sucesso!';
                
                unset($_SESSION['nome']);
                unset($_SESSION['tipo']);
            }
        ?>
    </body>
</html>    