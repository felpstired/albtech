<?php

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados['teste1'])) {
    echo json_encode($dados['teste1']);
    die();
}

if (!empty($dados['teste2'])) {
    echo json_encode($dados['teste2']);
    die();
}

?>