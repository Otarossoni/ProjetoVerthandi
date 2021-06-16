<?php
    //Inicia a Sessão
    session_start();
?>    

<DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="My Midia List">
        <meta name="author" content="Otávio Monteiro Rossoni">
        <title>Sucesso!</title>
    </head>

    <body>
        <!--Parte do Sistema destinada a exibir o resultado final da inserção-->
        <h3>Resultado:</h3>
        <?php
        if (isset($_SESSION['nome'])) {
            echo '<br> Bem-Vindo ' . $_SESSION['nome'] . '. Seu cadastro foi realizado com sucesso, agora retorne ao menu de Login!';

            unset($_SESSION['nome']);
        }
        ?>
        <form method="POST" action="../../index.php">
            <button style="background-color: purple; color: white" class="btn" type="submit">Login</button>
        </form>
    </body>

    </html>