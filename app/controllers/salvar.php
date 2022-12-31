<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once('../entities/Ladingpage.php');



//$_REQUEST pega dados de $_GET e de $_POST
if(!isset($_REQUEST['op'])){ //bloqueia acesso a requisicao na pagina sem operacao
    header('Location: ../../loja.php');
    exit;
}

$operacao = filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS);

if(empty($operacao)) $operacao = 'listar';

switch($operacao){

    case 'novo':
        novoDado();
        break;
    case 'salvar':
        salvar();
        break;
}

function novoDado(){
    header('Location: ../../loja.php');
}

function salvar(){

    if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['telefone']) || empty($_POST['data'])
    || empty($_POST['hora']) || empty($_POST['texto'])) {
        exit;
    }

    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['texto'];
    $dados = new dados($nome, $email, $telefone, $mensagem);
    $dados->setData(date('Y-m-d H:i:s'));
    if($dados->salvar()){
        echo "Dados enviados com sucesso";
        return true; //so para confirmar saida da funcao
    }
    else{
        echo "Insucesso ao salvar os dados";
    }
    return false;
}