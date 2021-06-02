<?php
    //Inicia a Sessão
    session_start();

    //Área de Inclusões 
    include '../Model/midia.php';
    include '../Include/MidiaValidate.php';
    include '../Dao/MidiaDAO.php';

    function criar() {
            //Array para a contabilização de erros
            $erros = array();
            
            //Estrutura de condicionamento para usar a função "minNota" do arquivo "Midiavalidate.php"
            if(!MidiaValidate::minNota($_POST['nota'])){
                $erros [] = 'A nota mínima é 0!';
            }

            //Estrutura de condicionamento para usar a função "maxNota" do arquivo "Midiavalidate.php"
            if(!MidiaValidate::maxNota($_POST['nota'])){
                $erros [] = 'A nota máxima é 10!';
            }

            //Estrutura de condicionamento para a inserção de uma nova midia, que só ativa se não houverem erros na array "$erros".
            if(count($erros) == 0){
                $midia = new Midia();

                $midia->id = $_POST['id'];
                $midia->nome = $_POST['nome'];
                $midia->tipo = $_POST['tipo'];
                $midia->status = $_POST['status'];
                $midia->dataTermino = $_POST['dataTermino'];
                $midia->avaliacao = $_POST['avaliacao'];
                $midia->nota = $_POST['nota'];

                $midiaDao = new MidiaDAO();
                $midiaDao->create($midia);

                //Echo de Midia inserida com sucesso usando Session.
                $_SESSION['nome'] = $midia->nome;
                $_SESSION['tipo'] = $midia->tipo;
                header("location:../View/Midia/detail.php");
            } else {
                //Echo de erro ao inserir nova midia usando Session.
                $err = serialize($erros);
                $_SESSION['erros'] = $err;
                header("location:../View/Midia/error.php");
        } 
    }

    function listar() {
        $midiaDao = new MidiaDAO();
        $midias = $midiaDao->search();

        $_SESSION['midias'] = serialize($midias);
        header("location:../View/Midia/list.php");
    }

    function atualizar() {
        echo "Em andamento!";
    }

    function deletar() {
        $id = $_GET['id'];
        if (isset($id)) {
            $midiaDao = new MidiaDAO();
            $midiaDao->delete($id);
            header("location:../Controller/MidiaController.php?operation=consultar");
        } else {
            echo 'Mídia informada não existente!';
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