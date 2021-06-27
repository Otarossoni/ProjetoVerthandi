<?php
    session_start();

    $user = unserialize($_SESSION['user']);
    if(!$user)
    header("location:../../index.php");
?>
<header class="header d-flex flex-column px-3 bg-white">
  <h1 class="mt-3"><i class="fas fa-film pr-2"></i>Mídia</h1>
  <p class="lead text-muted">Manutenção de mídias</p>
</header>

<main class="content container-fluid">
    <div class="p-3 mt-3 bg-white">
        <form action="../Controller/MidiaController.php?operation=cadastrar" class="form" method="post" name="form_midia">
            <div class="row">
            <div class="form-group text-left col-1">
                    <label>ID: </label>
                    <?php
                        $id = null;
                        if(isset($_SESSION['midia'])) {
                            $id = unserialize($_SESSION['midia'])[0]['id'];
                        }
                        echo "<input readonly type='text' name='id' id='id' class='form-control' value='$id'/>"
                    ?>
                </div>
                <div class="form-group text-left col-3">
                    <label>Nome: </label>
                    <?php
                        $nome = null;
                        if(isset($_SESSION['midia'])) {
                            $nome = unserialize($_SESSION['midia'])[0]['nome'];
                        }
                        echo "<input required type='text' name='nome' id='nome' class='form-control' placeholder='Digite o nome...' value='$nome'/>"
                    ?>
                </div>
                <div class="form-group text-left col-3">
                    <label>Tipo: </label>
                    <select required name="tipo" id="tipo" class="form-control" placeholder="Selecione o tipo...">
                        <option disabled selected>Selecione um tipo</option>
                        <?php
                            $idTipo = null;
                            if(isset($_SESSION['midia'])) {
                                $idTipo = unserialize($_SESSION['midia'])[0]['tipo'];
                            }

                            if(!isset($idTipo)) {
                                echo "<option disabled selected>Selecione um tipo</option>";
                            }

                            if(isset($_SESSION["tipos"])) {
                                $tipos = array();
                                $tipos = unserialize($_SESSION["tipos"]);

                                foreach($tipos as $t) {
                                    $id = $t['idtipo'];
                                    $nome = $t['nome'];

                                    if($idTipo != $id) {
                                        echo "<option value='$id'>$nome</option>";
                                    } else {
                                        echo "<option selected value='$id'>$nome</option>";
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group text-left col-3">
                    <label>Autor: </label>
                    <select required name="autor" id="autor" class="form-control" placeholder="Selecione o autor...">
                        <?php
                            $idAutor = null;
                            if(isset($_SESSION['midia'])) {
                                $idAutor = unserialize($_SESSION['midia'])[0]['autor'];
                            }

                            if(!isset($idAutor)) {
                                echo "<option disabled selected>Selecione um autor</option>";
                            }

                            if(isset($_SESSION["autores"])) {
                                $autores = array();
                                $autores = unserialize($_SESSION["autores"]);

                                foreach($autores as $a) {
                                    $id = $a['idautor'];
                                    $nome = $a['nome'];

                                    if($idAutor != $id) {
                                        echo "<option value='$id'>$nome</option>";
                                    } else {
                                        echo "<option selected value='$id'>$nome</option>";
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group text-left col-2">
                    <label>Status: </label>
                    <select required name="status" id="status" class="form-control">
                    <?php 
                        $status = null;
                        if(isset($_SESSION['midia'])) {
                            $status = unserialize($_SESSION['midia'])[0]['status'];
                        }

                        if(!isset($status)) {
                            echo "<option disabled selected>Selecione um status</option>";
                        } else {
                            echo "<option disabled selected>$status</option>";
                        }

                        $statusList = array(0 => 'Não iniciada', 1 => 'Em andamento', 2 => 'Finalizada', 3 => 'Interrompida');

                        foreach($statusList as $s) {
                            if($status != $s) {
                                echo "<option value='$s'>$s</option>";
                            } else {
                                echo "<option selected value='$s'>$s</option>";
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group text-left col-2">
                    <label>Data de Término:</label>
                    <?php
                        $dataTermino = null;
                        if(isset($_SESSION['midia'])) {
                            $dataTermino = unserialize($_SESSION['midia'])[0]['dataTermino'];
                        }
                        echo "<input type='date' name='dataTermino' id='dataTermino' class='form-control' placeholder='Digite a data de término...' value='$dataTermino'/>"
                    ?>
                </div>
                <div class="form-group text-left col-3">
                    <label>Avaliação: </label>
                    <?php
                        $avaliacao = null;
                        if(isset($_SESSION['midia'])) {
                            $avaliacao = unserialize($_SESSION['midia'])[0]['avaliacao'];
                        }
                        echo "<textarea required type='text' name='avaliacao' id='avaliacao' cols='20' rows='3' class='form-control' placeholder='Digite a avaliacao...'>$avaliacao</textarea>"
                    ?>
                </div>
                <div class="form-group text-left col-1">
                    <label>Nota:</label>
                    <?php
                        $nota = null;
                        if(isset($_SESSION['midia'])) {
                            $nota = unserialize($_SESSION['midia'])[0]['nota'];
                        }
                        echo "<input required type='number' name='nota' id='nota' class='form-control' value='$nota'/>";

                        unset($_SESSION['midia'])
                    ?>
                </div>
            </div>
                
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <input type="submit" value="Inserir" class="btn primary mr-2">
                    <a href="?page=midia" class="btn btn-secondary">Limpar</a>
                </div>
            </div>
        </form>

        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Autor</th>
                    <th>Status</th>
                    <th>Término</th>
                    <th>Avaliação</th>
                    <th>Nota</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_SESSION["midias"]) && isset($_SESSION["autores"]) && isset($_SESSION["tipos"])) {
                        $midias = array();
                        $tipos = array();
                        $autores = array();

                        $midias = unserialize($_SESSION['midias']);
                        $tipos = unserialize($_SESSION['tipos']);
                        $autores = unserialize($_SESSION['autores']);



                        foreach($midias as $m) {
                            $tipoIndex = array_search($m['tipo'], array_column($tipos, 'idtipo'));
                            $autorIndex = array_search($m['autor'], array_column($autores, 'idautor'));

                            $id = $m['id'];
                            $nome = $m['nome'];
                            $tipo = $tipos[$tipoIndex]['nome'];
                            $autor = $autores[$autorIndex]['nome'];
                            $status = $m['status'];
                            $dataTermino = $m['datatermino'];
                            $avaliacao = $m['avaliacao'];
                            $nota = $m['nota'];
                            echo "
                                <tr>
                                    <td>$id</td>
                                    <td>$nome</td>
                                    <td>$tipo</td>
                                    <td>$autor</td>
                                    <td>$status</td>
                                    <td>$dataTermino</td>
                                    <td>$avaliacao</td>
                                    <td>$nota</td>
                                    <td>
                                        <a href='../Controller/MidiaController.php?operation=atualizar&id=$id' class='btn btn-warning'><i class='fas fa-pencil-alt pr-2'></i>Alterar</a>
                                        <a href='../Controller/MidiaController.php?operation=deletar&id=$id' class='btn btn-danger'><i class='fa fa-trash pr-2'></i>Deletar</a>
                                    </td>
                                </tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>