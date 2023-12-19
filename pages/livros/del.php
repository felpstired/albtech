<?php

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './functions/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$id = $dados['id'];

$listId = listarRegistroUInt('tbemprestimo', 'idemprestimo', 'idemprestimo', $id);

if ($listId == 'Vazio') {

    $delete = deleteRegistro('tblivro', 'idlivro', $id);

    if ($delete == 'Deletado') {
        echo json_encode('OK');
        die();
    } elseif ($delete == 'nDeletado') {
        echo json_encode('Não foi possível deletar os dados.');
        die();
    } else {
        echo json_encode('Ocorreu um erro no servidor ao tentar deletar os dados.');
        die();
    }

} else {
    echo json_encode('Ocorreu um erro no servidor ao tentar deletar os dados.');
    die();
}
