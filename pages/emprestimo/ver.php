<?php

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './functions/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$id = $dados['id'];

$listar = listarRegistroUInt('tbemprestimo', 'idemprestimo, idlivro, idusuarios, datadevolucao, cadastro, ativo', 'idemprestimo', $id);

if ($listar == 'Vazio') {

    echo json_encode(['status' => false, 'dadosArray' => 'Não foi possível acessar as informações!']);
    die();

} else {

    foreach ($listar as $item) {
        $idemp = $item->idemprestimo;
        $idlivro = $item->idlivro;
        $iduser = $item->idusuarios;
        $status = $item->ativo;

        $dev = date_create($item->datadevolucao);
        $cad = date_create($item->cadastro);
    }

    $listUser = listarRegistroUInt('tbusuarios', 'nome', 'idusuarios', $iduser);

    if ($listUser == 'Vazio') {

        echo json_encode(['status' => false, 'dadosArray' => 'Não foi possível acessar as informações!']);
        die();
    
    } else {
        foreach ($listUser as $User) {
            $nomeuser = $User->nome;
        }
    }

    $listLivro = listarRegistroUInt('tblivro', 'titulo, autor', 'idlivro', $idlivro);

    if ($listLivro == 'Vazio') {

        echo json_encode(['status' => false, 'dadosArray' => 'Não foi possível acessar as informações!']);
        die();
    
    } else {
        foreach ($listLivro as $livro) {
            $livro = $livro->titulo;
            $autor = $livro->autor;
        }
    }

    $dev = date_format($dev, 'd/m/Y');
    $cad = date_format($cad, 'd/m/Y');

    if ($status == 'A') {
        $status = 'Ativo';
    } else {
        $status = 'Devolvido';
    }

    $lista = [
        'id'=> $idemp,
        'user'=> $nomeuser,
        'titulo'=> $livro,
        'autor'=> $autor,
        'cad'=> $cad,
        'dev'=> $dev,
        'status'=> $status,
    ];

    echo json_encode(['status' => 'OK', 'dadosArray' => $lista]);
    die();
}