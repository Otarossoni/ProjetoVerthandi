<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="My Midia List">
        <meta name="author" content="Otávio Monteiro Rossoni">
        <title>Inserção de Mídia</title>
    </head>

    <body>
        <!--Fórmulário responsável pela obtenção de informações necessárias para o funcionamento do Sistema-->
        <fieldset>
            <form action="../../Controller/MidiaController.php" method="post" name="form_midia">
                <label>ID: </label>
                <input type="number" name="id" id="id"/><br><br>
                <label>Nome: </label>
                <input type="text" name="nome" id="nome"/><br><br>
                <label>Tipo: </label>
                <input type="text" name="tipo" id="tipo"/><br><br>
                <label>Status: </label>
                <input type="text" name="status" id="status"><br><br>
                <label>Data de Término: </label>
                <input type="text" name="dataTermino" id="dataTermino"><br><br>
                <label>Avaliação:</label>
                <input type="text" name="avaliacao" id="avaliacao"><br><br>
                <label>Nota:</label>
                <input type="number" name="nota" id="nota"><br><br>
                <input type="submit" value="Inserir">
                <input type="reset" value="Limpar">
            </form>
        </fieldset>
    </body>
</html>