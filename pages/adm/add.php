<?php 

include_once './config/conexao.php';
include_once './config/constantes.php';
include_once './functions/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados['nomeAddAdm']) && !empty($dados['nomeAddAdm'])) {
    if ($dados['nomeAddAdm'] > 0) {
        $idadm = $dados['nomeAddAdm'];
    } else {
        echo json_encode('Administrador escolhido inválido.');
        die();
    }    
} else {
    echo json_encode('Campos não preenchidos ou inexistentes.');
    die();
}

$inserir = insertUmInt('tbadm', 'idusuarios, cadastro', $idadm);

if ($inserir == 'Gravado') {
    echo json_encode('OK');
    die();
} else if ($inserir == 'nGravado') {
    echo json_encode('Não foi possível cadastrar os dados.');
    die();
} else {
    echo json_encode('Ocorreu um erro no servidor ao tentar cadastrar os dados.');
    die();
}

?>