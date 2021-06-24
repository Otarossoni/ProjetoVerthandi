<?php
    session_start();

    $user = unserialize($_SESSION['user']);
    if(!$user)
    header("location:../../index.php");
?>
<header class="header d-flex flex-column px-3 bg-white">
  <h1 class="mt-3"><i class="fab fa-autoprefixer pr-2"></i>Autores</h1>
  <p class="lead text-muted">Manutenção de autores</p>
</header>

<main class="content container-fluid">
    <div class="p-3 mt-3 bg-white">
        <form action="../Controller/AutorController.php?operation=cadastrar" class="form" method="post" name="form_autor">
            <div class="row">
                <div class="form-group text-left col-1">
                    <label>ID: </label>
                    <?php
                        $id = '';
                        if(isset($_SESSION['autor'])) {
                            $id = unserialize($_SESSION['autor'])[0]['idautor'];
                        }
                        echo "<input readonly type='text' name='id' id='id' class='form-control' value='$id'/>"
                    ?>
                </div>
                <div class="form-group text-left col-3">
                    <label>Nome: </label>
                    <?php
                        $nome = '';
                        if(isset($_SESSION['autor'])) {
                            $nome = unserialize($_SESSION['autor'])[0]['nome'];
                        }
                        echo "<input required type='text' name='nome' id='nome' class='form-control' placeholder='Digite o nome...' value='$nome'/>";
                    ?>
                </div>
                <div class="form-group text-left col-3">
                    <label>Tipo: </label>
                    <?php
                        $tipo = '';
                        if(isset($_SESSION['autor'])) {
                            $tipo = unserialize($_SESSION['autor'])[0]['tipo'];
                        }
                        echo "<input required type='text' name='tipo' id='tipo' class='form-control' placeholder='Digite o tipo...' value='$tipo'/>";
                    ?>
                </div>
                <div class="form-group text-left col-5">
                    <label>Descrição: </label>
                    <?php
                        $descricao = '';
                        if(isset($_SESSION['autor'])) {
                            $descricao = unserialize($_SESSION['autor'])[0]['descricao'];
                        }
                        echo "<textarea required type='text' name='descricao' id='descricao' cols='20' rows='3' class='form-control' placeholder='Digite a descrição...'>$descricao</textarea>";

                        unset($_SESSION['autor'])
                    ?>
                </div>
                
            </div>

            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <input type="submit" value="Salvar" class="btn primary mr-2">
                    <a href="?page=autor" class="btn btn-secondary">Limpar</a>
                </div>
            </div>
        </form>

        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_SESSION["autores"])) {
                        $autores = array();
                        $autores = unserialize($_SESSION['autores']);

                        foreach($autores as $a) {
                            $id = $a['idautor'];
                            $nome = $a['nome'];
                            $descricao = $a['descricao'];
                            $tipo = $a['tipo'];
                            echo "
                                <tr>
                                    <td>$id</td>
                                    <td>$nome</td>
                                    <td>$tipo</td>
                                    <td>$descricao</td>
                                    <td>
                                        <a href='../Controller/AutorController.php?operation=consultar&id=$id' class='btn btn-warning'><i class='fas fa-pencil-alt pr-2'></i>Alterar</a>
                                        <a href='../Controller/AutorController.php?operation=deletar&id=$id' class='btn btn-danger'><i class='fa fa-trash pr-2'></i>Deletar</a>
                                    </td>
                                </tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>