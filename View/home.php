<?php
session_start();

$user = unserialize($_SESSION['user']);
if (!$user)
    header("location:../index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="padding: 0.5%;">
    <h1>Bem-vindo, Você!</h1><br>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Verthandi é um projeto de caráter educacional, desenvolvido durante o primeiro período letivo do ano de
        2021 na disciplina de “Desenvolvimento para Web”.</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Verthandi funciona como um catálogo pessoal de mídias, sendo elas audiovisuais ou não, aqui você pode cadastrar vários tipos de mídias,
        desde livros e jornais, até filmes, séries e animes. Mas você adiciona somente aquelas que lhe apetecerem. Autores também podem ser adicionados, eles podem ser realmente autores,
        mas também representam roteiristas, escritores e etc. O projeto é básico, mas serve como método de aperfeiçoamento daqueles por detrás do desenvolvimento.</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Abaixo, acesso ao GitHub de cada integrante, e o repositório do projeto:</p>
    <ul>
        <li>Verthandi: <a href="https://github.com/Otarossoni/ProjetoVerthandi">https://github.com/Otarossoni/ProjetoVerthandi</a></li>
        <li>Otávio Monteiro Rossoni: <a href="https://github.com/Otarossoni">https://github.com/Otarossoni</a></li>
        <li>Daniel Conte: <a href="https://github.com/Daniel-Conte">https://github.com/Daniel-Conte</a></li>
    </ul>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="font-weight: bold;">TRIVIA: </label> O nome Verthandi é baseado em uma das três normas nórdicas que regem o destino dos homens,
    Verthandi é a deusa do presente. Aproveite o seu, vá consumir algumas mídias. :)</p>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;El Psy Kongroo</p>
    </div>
</body>

</html>