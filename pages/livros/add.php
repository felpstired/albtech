<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './functions/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados['livroISBNForm'])) {
    if ($dados['livroISBNForm'] == '') {
        $isbn = 'Não disponível';
    } else {
        $isbn = $dados['livroISBNForm'];
    }  
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['livroTitulo']) && !empty($dados['livroTitulo'])) {
    $livroTitulo = $dados['livroTitulo'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['livroAutor']) && !empty($dados['livroAutor'])) {
    $livroAutor = $dados['livroAutor'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['livroDesc']) && !empty($dados['livroDesc'])) {
    $livroDesc = $dados['livroDesc'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['livroPubli']) && !empty($dados['livroPubli'])) {
    $livroPubli = $dados['livroPubli'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['livroCopias']) && !empty($dados['livroCopias'])) {
    $livroCopias = $dados['livroCopias'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['livroTipo']) && !empty($dados['livroTipo'])) {
    if ($dados['livroTipo'] > 0) {
        $livroTipo = $dados['livroTipo'];
    } else {
        echo json_encode('Tipo de arquivo escolhido inválido.');
        die();
    }    
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['livroLink']) && !empty($dados['livroLink'])) {
    
    $livroLink = $dados['livroLink'];

    if ($livroLink == '0') {
        echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
        die();
    }

} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}


$inserir = insertLivro('tblivro', 'idtipoLivro, titulo, autor, datapubli, descricao, capa, isbn, quantidade, cadastro', $livroTipo, $livroTitulo, $livroAutor, $livroPubli, $livroDesc, $livroLink, $isbn, $livroCopias);


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