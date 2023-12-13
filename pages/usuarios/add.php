<?php 

include_once './config/conexao.php';
include_once './config/constantes.php';
include_once './functions/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados['nomeAddUser']) && !empty($dados['nomeAddUser'])) {
    $nome = $dados['nomeAddUser'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['cpfAddUser']) && !empty($dados['cpfAddUser'])) {
    $cpf = $dados['cpfAddUser'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['telAddUser']) && !empty($dados['telAddUser'])) {
    $tel = $dados['telAddUser'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['emailAddUser']) && !empty($dados['emailAddUser'])) {
    $email = $dados['emailAddUser'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}


if (isset($dados['senhaAddUser']) && !empty($dados['senhaAddUser'])) {
    $senha = password_hash($dados['senhaAddUser'], PASSWORD_BCRYPT);
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

$inserir = insertCincoCad('tbusuarios', 'nome, telefone, cpf, email, senha, cadastro', $nome, $tel, $cpf, $email, $senha);

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