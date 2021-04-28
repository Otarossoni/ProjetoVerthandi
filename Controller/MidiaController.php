<?php
    //Inicia a Sessão
    session_start();

    //Área de Inclusões 
    include '../Model/midia.php';
    include '../Include/MidiaValidate.php';

    // Estrutura de condicionamento para verificar se os campos estão preenchidos
    if( (!empty($_POST['nome'])) &&
        (!empty($_POST['tipo'])) &&
        (!empty($_POST['status'])) &&
        (!empty($_POST['dataTermino'])) &&
        (!empty($_POST['avaliacao'])) &&
        (!empty($_POST['nota'])))
    {
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

            $midia->nome = $_POST['nome'];
            $midia->tipo = $_POST['tipo'];
            $midia->status = $_POST['status'];
            $midia->dataTermino = $_POST['dataTermino'];
            $midia->avaliacao = $_POST['avaliacao'];
            $midia->nota = $_POST['nota'];

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
    } else {
        //Echo de É necessário informar todos os campos usando Session.
        $erros = array();
        $erros[] = 'Informe todos os campos!';
        $err = serialize($erros);

        $_SESSION['erros'] = $err;
        header("location:../View/Midia/error.php");
    }
?>