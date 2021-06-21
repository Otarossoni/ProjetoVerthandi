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
                    <label>ID:</label>
                    <input required type="number" name="id" id="id" class="form-control"/>
                </div>
                <div class="form-group text-left col-3">
                    <label>Nome: </label>
                    <input required type="text" name="nome" id="nome" class="form-control" placeholder="Digite o nome..."/>
                </div>
                <div class="form-group text-left col-3">
                    <label>Tipo: </label>
                    <select required name="tipo" id="tipo" class="form-control" placeholder="Selecione o tipo...">
                        <option disabled selected>Selecione um tipo</option>
                        <?php
                            if(isset($_SESSION["tipos"])) {
                                $tipos = array();
                                $tipos = unserialize($_SESSION["tipos"]);

                                foreach($tipos as $t) {
                                    $id = $t['idtipo'];
                                    $nome = $t['nome'];

                                    echo "
                                        <option value='$id'>$nome</option>
                                    ";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group text-left col-3">
                    <label>Autor: </label>
                    <select required name="autor" id="autor" class="form-control" placeholder="Selecione o autor...">
                        <option disabled selected>Selecione um autor</option>
                        <?php
                            if(isset($_SESSION["autores"])) {
                                $autores = array();
                                $autores = unserialize($_SESSION["autores"]);

                                foreach($autores as $a) {
                                    $id = $a['idautor'];
                                    $nome = $a['nome'];

                                    echo "
                                        <option value='$id'>$nome</option>
                                    ";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group text-left col-2">
                    <label>Status: </label>
                    <select required name="status" id="status" class="form-control">
                        <option disabled selected>Selecione um status</option>
                        <option value="Não iniciada">Não iniciada</option>
                        <option value="Em andamento">Em andamento</option>
                        <option value="Finalizada">Finalizada</option>
                        <option value="Interrompida">Interrompida</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group text-left col-2">
                    <label>Data de Término:</label>
                    <input type="date" name="dataTermino" id="dataTermino" class="form-control" placeholder="Digite a data de término..."/>
                </div>
                <div class="form-group text-left col-3">
                    <label>Avaliação: </label>
                    <textarea required type="text" name="avaliacao" id="avaliacao" cols="20" rows="3" class="form-control" placeholder="Digite a avaliacao..."></textarea>
                </div>
                <div class="form-group text-left col-1">
                    <label>Nota:</label>
                    <input required type="number" name="nota" id="nota" class="form-control"/>
                </div>
            </div>
                
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <input type="submit" value="Inserir" class="btn primary mr-2">
                    <input type="reset" value="Limpar" class="btn btn-secondary">
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
                    if(isset($_SESSION["midias"])) {
                        $midias = array();
                        $midias = unserialize($_SESSION['midias']);

                        foreach($midias as $m) {
                            $id = $m['id'];
                            $nome = $m['nome'];
                            $idTipo = $m['tipo'];
                            $idAutor = $m['autor'];
                            $status = $m['status'];
                            $dataTermino = $m['datatermino'];
                            $avaliacao = $m['avaliacao'];
                            $nota = $m['nota'];
                            echo "
                                <tr>
                                    <td>$id</td>
                                    <td>$nome</td>
                                    <td>$idTipo</td>
                                    <td>$idAutor</td>
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