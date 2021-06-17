<?php
session_start();

$user = unserialize($_SESSION['user']);
if (!$user)
    header("location:../../index.php");
?>
<!DOCTYPE html>
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
        <form action="../../Controller/MidiaController.php?operation=cadastrar" method="post" name="form_midia">
            <label>ID: </label>
            <input required type="number" name="id" id="id" /><br><br>
            <label>Nome: </label>
            <input required type="text" name="nome" id="nome" /><br><br>

            <!-- <select required name="tipo">
                <option value="" disabled selected>Selecione o Tipo:</option>
             //   <?php
             //   include_once '../../Model/tipo.php';
             //   include_once '../../Dao/TipoDAO.php';

             //   $tipoDao = new TipoDAO();
             //   $tipos = $tipoDao->search();

             //   foreach ($tipos as $t) {
             //       $idT = $t['idtipo'];
             //       $nomeT = $t['nome'];

             //       echo "<option value='$idT'>$nomeT</option>";
             //   }
                ?>
            </select> <br><br> -->

            <label>Tipo: </label>
            <input required type="number" name="tipo" id="tipo" /><br><br>

            <label>Autor: </label>
            <input required type="number" name="autor" id="autor" /><br><br>

            <label>Status: </label>
            <input required type="text" name="status" id="status"><br><br>
            <label>Data de Término: </label>
            <input type="text" name="dataTermino" id="dataTermino"><br><br>
            <label>Avaliação:</label>
            <input type="text" name="avaliacao" id="avaliacao"><br><br>
            <label>Nota:</label>
            <input required type="number" name="nota" id="nota"><br><br>
            <input type="submit" value="Inserir">
            <input type="reset" value="Limpar">
        </form>
    </fieldset>
</body>

</html>