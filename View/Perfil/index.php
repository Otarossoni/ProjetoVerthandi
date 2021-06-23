<?php
session_start();

$user = unserialize($_SESSION['user']);
if (!$user)
    header("location:../index.php");
?>

<header class="header d-flex flex-column px-3 bg-white">
  <h1 class="mt-3"><i class="fas fa-user pr-2"></i>Perfil do usuário</h1>
  <p class="lead text-muted">Visualize suas informações</p>
</header>

<main class="content container-fluid">
    <div class="p-3 mt-3 bg-white">
        <h3>Informações básicas</h3>
        <ul>
            <li><strong>Nome:</strong> <?php echo $user[0]['nome']; ?></li>
            <li><strong>E-mail:</strong> <?php echo $user[0]['email']; ?></li>
        </ul>
        <!-- <form action="../Controller/UserController.php?operation=atualizar" class="form col-3" name="form_perfil">
            <div class="row">
                <div class="form-group text-left col-12">
                    <label>Nome: </label>
                    <?php
                        $nome = $user[0]['nome'];
                        echo "<input required type='text' name='nome' id='nome' class='form-control' placeholder='Digite seu nome...' value='$nome'/>" 
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group text-left col-12">
                    <label>E-mail: </label>
                    <?php
                        $email = $user[0]['email'];
                        echo "<input disabled type='email' name='email' id='email' class='form-control' placeholder='Digite seu e-mail...' value='$email'/>" 
                    ?>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href='../Controller/UserController.php?operation=atualizar' class='btn primary'>Salvar</a>
            </div>
        </form>
        
        <div class="d-flex justify-content-end">
            <a href='../Controller/UserController.php?operation=deletar' class='btn btn-outline-danger'><i class='fa fa-trash pr-2'></i>Deletar</a>
        </div> -->
    </div>
</main>