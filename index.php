<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tela de Login</title>
    </head>
    <body>
        <form action="/Controller/AuthController.php?operation=login" method="POST" name="form_userLogin">
            <label>E-mail: </label>
            <input required type="email" name="email" id="email"/><br><br>
            <label>Senha: </label>
            <input required type="password" name="senha" id="senha"><br><br>
            <input type="submit" value="Login">
            <input type="reset" value="Limpar">
        </form>
    </body>
</html>