<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Tela de Login</title>
</head>

<body>
    <div id='login'>
        <div class="col-4 bg-white py-5 px-4">
            <form action="./Controller/AuthController.php?operation=login" class="form-signin text-center" method="POST" name="form_userLogin">
                <h1>Login</h1>

                <div class="col-12">
                    <div class="form-group text-left">
                        <label>E-mail: </label>
                        <input required type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail..." />
                    </div>
                    <div class="form-group text-left">
                        <label>Senha: </label>
                        <input required type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha...">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Login">
                <input type="reset" class="btn btn-secondary" value="Limpar">
            </form>
            <form method="POST" action="./View/Cadastro/create.php">
                <button style="background-color: purple; color: white" class="btn" type="submit">Cadastrar</button>
            </form>
        </div>

    </div>
</body>
</html>