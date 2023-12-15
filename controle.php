<?php

include_once './config/conexao.php';
include_once './config/constantes.php';
include_once './functions/dashboard.php';

// echo json_encode('Página controle');

$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);

switch ($acao) {

    // sessão do usuário
    case 'Login':
        include_once './pages/login.php';
        break;

    case 'Logout':
        include_once './pages/logout.php';
        break;

    case 'AltUser':
        $_SESSION['pages'] = $acao;
        include_once './pages/altuser.php';
        break;

    case 'altSession':
        include_once './pages/altsession.php';
        break;


    // página de consulta de ISBN via API
    case 'consultaISBN':
        include_once './pages/livros/consultaISBN.php';
        break;


    // navegação da página     
    case 'home':
        $_SESSION['pages'] = $acao;
        include_once './home.php';
        break;
    
    case 'pageEmp':
        $_SESSION['pages'] = $acao;
        include_once './pages/emprestimo/listar.php';
        break;


    case 'pageDev':
        $_SESSION['pages'] = $acao;
        include_once './pages/devolucao/listar.php';
        break;


    case 'pageLiv':
        $_SESSION['pages'] = $acao;
        include_once './pages/livros/listar.php';
        break;
    case 'addLivro':
        $_SESSION['pages'] = $acao;
        include_once './pages/livros/add.php';
        break;
    case 'listarLivro':
        $_SESSION['pages'] = $acao;
        include_once './pages/livros/listarTable.php';
        break;


    case 'pageTLiv':
        $_SESSION['pages'] = $acao;
        include_once './pages/tlivros/listar.php';
        break;


    case 'pageUser':
        $_SESSION['pages'] = $acao;
        include_once './pages/usuarios/listar.php';
        break;
    case 'listarUser':
        include_once './pages/usuarios/listarTable.php';
        break;
    case 'addUser':
        include_once './pages/usuarios/add.php';
        break;
    case 'verUser':
        include_once './pages/usuarios/ver.php';
        break;
    case 'altUser':
        include_once './pages/usuarios/alt.php';
        break;
    case 'delUser':
        include_once './pages/usuarios/del.php';
        break;


    case 'pageAdm':
        $_SESSION['pages'] = $acao;
        include_once './pages/adm/listar.php';
        break;


    case 'pageLog':
        $_SESSION['pages'] = $acao;
        include_once './pages/log.php';
        break;

}
