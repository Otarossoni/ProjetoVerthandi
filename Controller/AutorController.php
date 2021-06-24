<?php
//Inicia a Sessão
session_start();

//Área de Inclusões 
include '../Model/autor.php';
include '../Include/AutorValidate.php';
include '../Dao/AutorDAO.php';

function criar()
{
    //Array para a contabilização de erros
    $erros = array();

    //Estrutura de condicionamento para a inserção de um novo tipo, que só ativa se não houverem erros na array "$erros".
    if (count($erros) == 0) {
        $autor = new Autor();
        $user = unserialize($_SESSION['user']);

        $autor->nome = $_POST['nome'];
        $autor->descricao = $_POST['descricao'];
        $autor->tipo = $_POST['tipo'];
        $autor->usuario = $user[0]['id'];

        $autorDao = new AutorDAO();
        $autorDao->create($autor);

        //Echo de Autor inserido com sucesso usando Session.
        $_SESSION['nome'] = $autor->nome;

        listar();
    } else {
        //Echo de erro ao inserir nova midia usando Session.
        $err = serialize($erros);
        $_SESSION['erros'] = $err;
        header("location:../View/Autor/error.php");
    }
}

function listar()
{
    $autorDoa = new AutorDAO();
    $autores = $autorDoa->search();

    $_SESSION['autores'] = serialize($autores);
    header("location:../View/app.php?page=autor");
}

function atualizar()
{
    $user = unserialize($_SESSION['user']);
    $autor = new Autor();

    $autor->id = $_POST['id'];
    $autor->nome = $_POST['nome'];
    $autor->descricao = $_POST['descricao'];
    $autor->tipo = $_POST['tipo'];
    $autor->usuario = $user[0]['id'];

    $autorDao = new AutorDAO();
    $autorDao->update($autor);

    listar();
}

function deletar()
{
    $id = $_GET['id'];
    if (isset($id)) {
        $autorDao = new AutorDAO();
        $autorDao->delete($id);

        listar();
    } else {
        echo 'Autor informado não existente!';
    }
}

function searchAutor($id)
{
    $autorDoa = new AutorDAO();
    $autor = $autorDoa->searchAutor($id);

    $_SESSION['autor'] = serialize($autor);
    header("location:../View/app.php?page=autor");
}

$operacao = $_GET['operation'];
if (isset($operacao)) {
    switch ($operacao) {
        case 'cadastrar':
            if (isset($_POST['id']) && $_POST['id'] != '') {
                atualizar();
            } else {
                criar();
            };
            break;
        case 'consultar':
            if (isset($_GET['id'])) {
                searchAutor($_GET['id']);
            } else {
                listar();
            };
            break;
        case 'atualizar':
            atualizar();
            break;
        case 'deletar':
            deletar();
            break;
    }
}
