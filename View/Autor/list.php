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
        <title>Listagem de Autores</title>
    </head>

    <body>
        <?php
            if(isset($_SESSION["autores"])) {
                include_once '../../Model/autor.php';

                $autores = array();
                $autores = unserialize($_SESSION['autores']);

                foreach($autores as $a) {
                    $id = $a['idautor'];
                    $nome = $a['nome'];
                    $descricao = $a['descricao'];
                    $tipo = $a['tipo'];
                    echo "<tr><td><a href='../../Controller/AutorController.php?operation=deletar&id=$id'>Deletar</a></td> - $nome - $descricao - $tipo<br></tr>";
                }

                unset($_SESSION['autores']);
            }
        ?>
        <li><a href="http://localhost:9999/View/app.php">HOME</a></li>    
    </body>    
</html>