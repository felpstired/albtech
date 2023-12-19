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



        // navegação da página     
    case 'home':
        $_SESSION['pages'] = $acao;
        include_once './home.php';
        break;



    case 'pageEmp':
        unset($_SESSION['numPage']);
        $_SESSION['pages'] = $acao;
        include_once './pages/emprestimo/listar.php';
        break;

    case 'listarEmp':
        include_once './pages/emprestimo/listarTable.php';
        break;

    case 'addEmp':
        include_once './pages/emprestimo/add.php';
        break;

    case 'verEmp':
        include_once './pages/emprestimo/ver.php';
        break;



    case 'pageDev':
        unset($_SESSION['numPage']);
        $_SESSION['pages'] = $acao;
        include_once './pages/devolucao/listar.php';
        break;



    case 'pageLiv':
        unset($_SESSION['numPage']);
        $_SESSION['pages'] = $acao;
        include_once './pages/livros/listar.php';
        break;

    case 'listarLivro':
        include_once './pages/livros/listarTable.php';
        break;

        // página de consulta de ISBN via API
    case 'consultaISBN':
        include_once './pages/livros/consultaISBN.php';
        break;

    case 'addLivro':
        include_once './pages/livros/add.php';
        break;

    case 'verLivro':
        include_once './pages/livros/ver.php';
        break;

    case 'delLivro':
        include_once './pages/livros/del.php';
        break;



    case 'pageTLiv':
        unset($_SESSION['numPage']);
        $_SESSION['pages'] = $acao;
        include_once './pages/tlivros/listar.php';
        break;



    case 'pageUser':
        unset($_SESSION['numPage']);
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
        unset($_SESSION['numPage']);
        $_SESSION['pages'] = $acao;
        include_once './pages/adm/listar.php';
        break;
    case 'listarAdm':
        include_once './pages/adm/listarTable.php';
        break;
    case 'addAdm':
        include_once './pages/adm/add.php';
        break;
    case 'verAdm':
        include_once './pages/adm/ver.php';
        break;
    case 'delAdm':
        include_once './pages/adm/del.php';
        break;



    case 'pageLog':
        unset($_SESSION['numPage']);
        $_SESSION['pages'] = $acao;
        include_once './pages/log.php';
        break;



    case 'numPage':
        include_once './pages/numpage.php';
        break;
}
