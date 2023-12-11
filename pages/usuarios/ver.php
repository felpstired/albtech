<?php

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './functions/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$id = $dados['id'];

$listar = listarRegistroUInt('tbusuarios', 'idusuarios, nome, telefone, cpf, email, pontuacao, cadastro, alteracao, ativo', 'idusuarios', $id);

if ($listar == 'Vazio') {

    echo json_encode(['status' => false, 'dadosArray' => 'Não foi possível acessar as informações!']);
    die();

} else {

    foreach ($listar as $item) {
        $iduser = $item->idusuarios;
        $nome = $item->nome;
        $tel = $item->telefone;
        $cpf = $item->cpf;
        $email = $item->email;
        $pont = $item->pontuacao;
        $cad = date_create($item->cadastro);
        $alt = date_create($item->alteracao);
        $status = $item->ativo;
    }

    $cad = date_format($cad, 'd/m/Y');
    $alt = date_format($alt, 'd/m/Y H:i:s');

    if ($status == 'A') {
        $status = 'Ativo';
    } else {
        $status = 'Inativo';
    }

    $lista = [
        'id'=> $iduser,
        'nome'=> $nome,
        'tel'=> $tel,
        'cpf'=> $cpf,
        'email'=> $email,
        'pont'=> $pont,
        'cad'=> $cad,
        'alt'=> $alt,
        'status'=> $status,
    ];

    echo json_encode(['status' => 'OK', 'dadosArray' => $lista]);
    die();
}