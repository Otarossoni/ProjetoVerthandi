<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Acesso ao Sistema</title>
    </head>
    <body>
        <?php
            if (isset($_SESSION['user'])){
                echo "<h1>USUÁRIO ONLINE</h1>";
                echo '<br><a href="../Controller/AuthController.php?operation=logout">Logout</a></br>';
            } else {
                echo "<h1>USUÁRIO OFFLINE</h1>";
            }
        ?>
    </body>
</html>