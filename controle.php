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


    // navegação da página     
    case 'home':
        $_SESSION['pages'] = $acao;
        include_once './home.php';
        break;

}
