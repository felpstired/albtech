<?php

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './functions/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$id = $dados['id'];

$listar = listarRegistroUInt('tblivro', 'idlivro, idtipoLivro, titulo, autor, datapubli, descricao, capa, isbn, quantidade, cadastro, alteracao', 'idlivro', $id);

if ($listar == 'Vazio') {

    echo json_encode(['status' => false, 'dadosArray' => 'Não foi possível acessar as informações!']);
    die();

} else {

    foreach ($listar as $item) {
        $idlivro = $item->idlivro;
        $idtipoLivro = $item->idtipoLivro;
        $titulo = $item->titulo;
        $autor = $item->autor;
        $publi = $item->datapubli;
        $desc = $item->descricao;
        $capa = $item->capa;
        $isbn = $item->isbn;
        $qtdd = $item->quantidade;

        $cad = date_create($item->cadastro);
        $alt = date_create($item->alteracao);
    }

    $listType = listarRegistroUInt('tbtipoLivro', 'tipoLivro', 'idtipoLivro', $idtipoLivro);

    if ($listType == 'Vazio') {

        echo json_encode(['status' => false, 'dadosArray' => 'Não foi possível acessar as informações!']);
        die();
    
    } else {
        foreach ($listType as $type) {
            $tipo = $type->tipoLivro;
        }
    }

    $cad = date_format($cad, 'd/m/Y');
    $alt = date_format($alt, 'd/m/Y H:i:s');

    $lista = [
        'id'=> $idlivro,
        'tipo'=> $tipo,
        'titulo'=> $titulo,
        'autor'=> $autor,
        'publi'=> $publi,
        'desc'=> $desc,
        'capa'=> $capa,
        'isbn'=> $isbn,
        'qtdd'=> $qtdd,
        'cad'=> $cad,
        'alt'=> $alt,
    ];

    echo json_encode(['status' => 'OK', 'dadosArray' => $lista]);
    die();
}