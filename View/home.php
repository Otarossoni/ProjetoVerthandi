<?php
session_start();

$user = unserialize($_SESSION['user']);
if (!$user)
    header("location:../index.php");
?>

<header class="header d-flex flex-column px-3 bg-white">
  <h1 class="mt-3"><i class="fa fa-home pr-2"></i>Bem-vindo, Você!</h1>
  <p class="lead text-muted">Verthandi é um projeto de caráter educacional, desenvolvido durante o primeiro período letivo do ano de 2021 na disciplina de “Desenvolvimento para Web”.</p>
</header>

<main class="content container-fluid">
    <div class="p-3 mt-3 bg-white">
        <p>Verthandi funciona como um <strong>catálogo pessoal de mídias</strong>, sendo elas audiovisuais ou não, aqui você pode cadastrar vários tipos de mídias, desde livros e jornais, até filmes, séries e animes. Mas você adiciona somente aquelas que lhe apetecerem. Autores também podem ser adicionados, eles podem ser realmente autores, mas também representam roteiristas, escritores e etc. O projeto é básico, mas serve como método de aperfeiçoamento daqueles por detrás do desenvolvimento</p>
        <p>Abaixo, acesso ao GitHub de cada integrante, e o repositório do projeto:</p>
        <ul>
            <li><strong>Verthandi:</strong> <a href="https://github.com/Otarossoni/ProjetoVerthandi">https://github.com/Otarossoni/ProjetoVerthandi</a></li>
            <li><strong>Otávio Monteiro Rossoni:</strong> <a href="https://github.com/Otarossoni">https://github.com/Otarossoni</a></li>
            <li><strong>Daniel Conte:</strong> <a href="https://github.com/Daniel-Conte">https://github.com/Daniel-Conte</a></li>
        </ul>
        <p><strong>TRIVIA:</strong> O nome Verthandi é baseado em uma das três normas nórdicas que regem o destino dos homens, Verthandi é a deusa do presente. Aproveite o seu, vá consumir algumas mídias. :)</p>
        
        <p class="mt-5">El Psy Kongroo</p>
    </div>
</main>