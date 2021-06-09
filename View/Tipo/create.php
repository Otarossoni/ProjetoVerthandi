<?php
    session_start();

    $user = unserialize($_SESSION['user']);
    if(!$user)
    header("location:../../index.php");
?>
<!DOCTYPE html>
<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="My Midia List">
        <meta name="author" content="Otávio Monteiro Rossoni">
        <title>Inserção de Tipo de Mídia</title>
    </head>

    <body>
        <!--Fórmulário responsável pela obtenção de informações necessárias para o funcionamento do Sistema-->
        <fieldset>
            <form action="../../Controller/TipoController.php?operation=cadastrar" method="post" name="form_tipo">
                <label>ID: </label>
                <input required type="number" name="idTipo" id="id"/><br><br>
                <label>Nome: </label>
                <input required type="text" name="nome" id="nome"/><br><br>
                <label>Descrição: </label>
                <input required type="text" name="descricao" id="descricao"/><br><br>
                <input type="submit" value="Inserir">
                <input type="reset" value="Limpar">
            </form>
        </fieldset>
    </body>
</html>