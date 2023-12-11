<?php

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './functions/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$isbn = str_replace('-', '', $dados['isbn']);

$api_url = "https://www.googleapis.com/books/v1/volumes?q=isbn:" . $isbn;

$response = file_get_contents($api_url);

if ($response !== false) {
    $data = json_decode($response, true);

    if (isset($data['items'][0]['volumeInfo'])) {
        $livro = $data['items'][0]['volumeInfo'];

        if (isset($livro['title'])) {
            $titulo = $livro['title'];
        } else {
            $titulo = 'Título não disponível.';
        }

        if (isset($livro['authors'])) {
            $autor = implode(", ", $livro['authors']);
        } else {
            $autor = 'Autor(es) não disponível.';
        }

        if (isset($livro['description'])) {
            $desc = $livro['description'];
        } else {
            $desc = 'Descrição não disponível.';
        }

        if (isset($livro['publishedDate'])) {
            $dataPubli = $livro['publishedDate'];
        } else {
            $dataPubli = false;
        }

        if (isset($livro['imageLinks']['thumbnail'])) {
            $linkCapa = $livro['imageLinks']['thumbnail'];
        } else {
            $linkCapa = 'Link não disponível.';
        }

        $lista = [
            'titulo'=> $titulo,
            'autor'=> $autor,
            'desc'=> $desc,
            'dataPubli'=> $dataPubli,
            'linkCapa'=> $linkCapa,
        ];

        echo json_encode(['status' => 'OK', 'dadosArray' => $lista]);
        die();

    } else {
        echo json_encode(['status' => false, 'dadosArray' => 'Livro não encontrado.']);
        die();
    }
} else {
    echo json_encode(['status' => false, 'dadosArray' => 'Erro ao acessar a API do Google Books.']);
    die();
}
?>
