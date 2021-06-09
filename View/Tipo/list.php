<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem de Tipos de Mídia</title>
    </head>

    <body>
        <?php
            if(isset($_SESSION["tipos"])) {
                include_once '../../Model/tipo.php';

                $tipos = array();
                $tipos = unserialize($_SESSION['tipos']);

                foreach($tipos as $t) {
                    $id = $t['idtipo'];
                    $nome = $t['nome'];
                    $descricao = $t['descricao'];
                    echo "<tr><td><a href='../../Controller/TipoController.php?operation=deletar&id=$id'>Deletar</a></td> - $nome - $descricao<br></tr>";
                }

                unset($_SESSION['tipos']);
            }
        ?>
    </body>    
</html>