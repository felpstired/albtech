<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './functions/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados['empUser']) && !empty($dados['empUser'])) {
    if ($dados['empUser'] > 0) {
        $idUser = $dados['empUser'];
    } else {
        echo json_encode('Usuário escolhido inválido.');
        die();
    }    
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['empLivro']) && !empty($dados['empLivro'])) {
    if ($dados['empLivro'] > 0) {
        $idLivro = $dados['empLivro'];
    } else {
        echo json_encode('Livro escolhido inválido.');
        die();
    }    
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['empDev']) && !empty($dados['empDev'])) {
    $dataDev = $dados['empDev'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

echo json_encode($dataDev);

$inserirEmp = insertEmp('tbemprestimo', 'idlivro, idusuarios, datadevolucao, cadastro', $idLivro, $idUser, $dataDev);

// echo json_encode($inserirEmp);

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