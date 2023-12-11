<?php

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './functions/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados['emailLogin']) && !empty($dados['emailLogin'])) {
    $email = $dados['emailLogin'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes.');
    die();
}

$existeEmail = listarRegistrosStr('senha', 'tbusuarios', 'email', $email);

if ($existeEmail == 'Vazio') {
    echo json_encode('E-mail não cadastrado.');
    die();
} else {
    foreach ($existeEmail as $listarSenha) {
        $senhaBanco = $listarSenha->senha;
    }
}

if (isset($dados['senhaLogin']) && !empty($dados['senhaLogin'])) {
    $senha = $dados['senhaLogin'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes.');
    die();
}

if (!password_verify($senha, $senhaBanco)) {
    echo json_encode('E-mail e/ou senha incorretos.');
    die();
}

$checarDados = checarLoginEmail('idusuarios, nome, telefone, cpf, email, senha, pontuacao, cadastro, alteracao, ativo', 'tbusuarios', $email, $senhaBanco);

if ($checarDados == 'false') {
    echo json_encode('E-mail e/ou senha incorretos.');
    die();
} else {

    foreach ($checarDados as $itemDados) {

        $checarAdm = checarAdm($itemDados->idusuarios);

        if ($checarAdm == 'false') {
            echo json_encode('Este usuário não possui permissão.');
            die();
        } else {

            $_SESSION['dadosUser'] = array(
                "id" => $itemDados->idusuarios,
                "nome" => $itemDados->nome,
                "telefone" => $itemDados->telefone,
                "cpf" => $itemDados->cpf,
                "email" => $itemDados->email,
                "pontuacao" => $itemDados->pontuacao,
                "cadastro" => $itemDados->cadastro,
                "alteracao" => $itemDados->alteracao,
                "ativo" => $itemDados->ativo
            );

        }

    }

    echo json_encode('OK');
    die();

}
