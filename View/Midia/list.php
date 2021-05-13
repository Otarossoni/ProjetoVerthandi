<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem de Mídias</title>
    </head>

    <body>
        <?php
            if(isset($_SESSION["midias"])) {
                include_once '../../Model/midia.php';

                $midias = array();
                $midias = unserialize($_SESSION['midias']);

                foreach($midias as $m) {
                    $id = $m['id'];
                    $nome = $m['nome'];
                    echo "<tr><td><a href='../../Controller/MidiaController.php?operation=deletar&id=$id'>Deletar</a></td> - $nome<br></tr>";
                }

                unset($_SESSION['midias']);
            }
        ?>
    </body>    
</html>