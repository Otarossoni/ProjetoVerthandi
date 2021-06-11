<?php
    //Inicia a Sessão
    session_start();

    //Área de Inclusões 
    include '../Model/autor.php';
    include '../Include/AutorValidate.php';
    include '../Dao/AutorDAO.php';

    function criar() {
            //Array para a contabilização de erros
            $erros = array();

            //Estrutura de condicionamento para a inserção de um novo tipo, que só ativa se não houverem erros na array "$erros".
            if(count($erros) == 0){
                $autor = new Autor();

                $autor->idAutor = $_POST['idAutor'];
                $autor->nome = $_POST['nome'];
                $autor->descricao = $_POST['descricao'];
                $autor->tipo = $_POST['tipo'];

                $autorDao = new AutorDAO();
                $autorDao->create($autor);

                //Echo de Autor inserido com sucesso usando Session.
                $_SESSION['nome'] = $autor->nome;
                header("location:../View/Autor/detail.php");
            } else {
                //Echo de erro ao inserir nova midia usando Session.
                $err = serialize($erros);
                $_SESSION['erros'] = $err;
                header("location:../View/Autor/error.php");
        } 
    }

    function listar() {
        $autorDoa = new AutorDAO();
        $autores = $autorDoa->search();

        $_SESSION['autores'] = serialize($autores);
        header("location:../View/Autor/list.php");
    }

    function atualizar() {
        echo "Em andamento!";
    }

    function deletar() {
        $id = $_GET['id'];
        if (isset($id)) {
            $autorDao = new AutorDAO();
            $autorDao->delete($id);
            header("location:../Controller/AutorController.php?operation=consultar");
        } else {
            echo 'Autor informado não existente!';
        }
    }

    $operacao = $_GET['operation'];
    if (isset($operacao)) {
        switch($operacao) {
            case 'cadastrar':
                criar();
                break;
            case 'consultar':
                listar();
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