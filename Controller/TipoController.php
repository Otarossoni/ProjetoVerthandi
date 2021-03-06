<?php
//Inicia a Sessão
session_start();

//Área de Inclusões 
include '../Model/tipo.php';
include '../Include/TipoValidate.php';
include '../Dao/TipoDAO.php';

function criar()
{
    //Array para a contabilização de erros
    $erros = array();

    //Estrutura de condicionamento para a inserção de um novo tipo, que só ativa se não houverem erros na array "$erros".
    if (count($erros) == 0) {
        $tipo = new Tipo();
        $user = unserialize($_SESSION['user']);

        $tipo->nome = $_POST['nome'];
        $tipo->descricao = $_POST['descricao'];
        $tipo->usuario = $user[0]['id'];

        $tipoDao = new TipoDAO();
        $tipoDao->create($tipo);

        //Echo de Midia inserida com sucesso usando Session.
        $_SESSION['nome'] = $tipo->nome;

        listar();
    } else {
        //Echo de erro ao inserir nova midia usando Session.
        $err = serialize($erros);
        $_SESSION['erros'] = $err;
        header("location:../View/Tipo/error.php");
    }
}

function listar()
{
    $tipoDoa = new TipoDAO();
    $tipos = $tipoDoa->search();

    $_SESSION['tipos'] = serialize($tipos);
    header("location:../View/app.php?page=tipo");
}

function atualizar()
{
    $user = unserialize($_SESSION['user']);
    $tipo = new Tipo();

    $tipo->id = $_POST['id'];
    $tipo->nome = $_POST['nome'];
    $tipo->descricao = $_POST['descricao'];
    $tipo->usuario = $user[0]['id'];

    $tipoDao = new TipoDAO();
    $tipoDao->update($tipo);

    listar();
}

function deletar()
{
    $id = $_GET['id'];
    if (isset($id)) {
        $tipoDao = new TipoDAO();
        $tipoDao->delete($id);

        listar();
    } else {
        echo 'Tipo informado não existente!';
    }
}

function searchTipo($id)
{
    $tipoDoa = new TipoDAO();
    $tipo = $tipoDoa->searchTipo($id);

    $_SESSION['tipo'] = serialize($tipo);
    header("location:../View/app.php?page=tipo");
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
                searchTipo($_GET['id']);
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
?>