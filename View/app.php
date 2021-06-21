<?php
    session_start();

    $user = unserialize($_SESSION['user']);
    if(!$user)
    header("location:../index.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../style.css" />
        <title>Projeto Verthandi</title>
    </head>
    <body>
        <div class="app">
            <aside class="logo">
                <!--<a href="#" class="logo">Logo</a>-->

                <img src="../Images/logo.png" alt="Logo" width="250px" height="125px" style="margin-left: -7%;">
            </aside>

            <aside class="menu-area">
                <nav class="menu d-flex flex-column justify-content-between">
                    <div>
                        <a href="?page=home"> <i class="fa fa-home pr-1"></i>Home </a>
                        <a href="../Controller/AutorController.php?operation=consultar"> <i class="fab fa-autoprefixer pr-1"></i>Autor </a>
                        <a href="../Controller/MidiaController.php?operation=consultar"> <i class="fas fa-film pr-1"></i>Mídia </a>
                        <a href="../Controller/TipoController.php?operation=consultar"> <i class="fas fa-layer-group pr-1"></i>Tipo </a>
                    </div>
                    
                    <a href="../Controller/AuthController.php?operation=logout"><i class="fas fa-sign-out-alt pr-1"></i>Sair</a>
                </nav>
            </aside>

            <div id="mainContent"></div>

            <footer class="footer"><span>Desenvolvido por Daniel Conte e Otávio Monteiro Rossoni</span></footer>
        </div>
        <script src="./navigation.js"></script>
    </body>
</html>