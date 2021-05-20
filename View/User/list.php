<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem de Usuários</title>
    </head>

    <body>
        <?php
            if(isset($_SESSION["user"])) {
                include_once '../../Model/user.php';

                $user = array();
                $user = unserialize($_SESSION['user']);

                foreach($user as $m) {
                    $id = $m['id'];
                    $nome = $m['nome'];
                    echo "<tr><td><a href='../../Controller/UserController.php?operation=deletar&id=$id'>Deletar</a></td> - $nome<br></tr>";
                }

                unset($_SESSION['user']);
            }
        ?>
    </body>    
</html>