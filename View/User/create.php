<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="My Midia List">
        <meta name="author" content="Otávio Monteiro Rossoni">
        <title>Inserção de Usuário</title>
    </head>

    <body>
        <!--Fórmulário responsável pela obtenção de informações necessárias para o funcionamento do Sistema-->
        <fieldset>
            <form action="../../Controller/UserController.php?operation=cadastrar" method="post" name="form_user">
                <label>ID: </label>
                <input required type="number" name="id" id="id"/><br><br>
                <label>Nome: </label>
                <input required type="text" name="nome" id="nome"/><br><br>
                <label>E-mail: </label>
                <input required type="email" name="email" id="email"/><br><br>
                <label>Senha: </label>
                <input required type="password" name="senha" id="senha"><br><br>
                <input type="submit" value="Inserir">
                <input type="reset" value="Limpar">
            </form>
        </fieldset>
    </body>
</html>