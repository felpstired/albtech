<?php 


include_once './config/conexao.php';
include_once './config/constantes.php';
include_once './functions/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados['nomeAltSession']) && !empty($dados['nomeAltSession'])) {
    $nome = $dados['nomeAltSession'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes.');
    die();
}

if (isset($dados['telAltSession']) && !empty($dados['telAltSession'])) {
    $tel = $dados['telAltSession'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes.');
    die();
}

if (isset($dados['emailAltSession']) && !empty($dados['emailAltSession'])) {
    $email = $dados['emailAltSession'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes.');
    die();
}

if (isset($dados['senhaAltSession']) && !empty($dados['senhaAltSession'])) {
    if ($dados['senhaAltSession'] == $_SESSION['dadosUser']['senha']) {
        echo json_encode('erroS');
        die();
    } else {
        $senha = password_hash($dados['senhaAltSession'], PASSWORD_BCRYPT);
    }    
} else {
    $senha = false;
}

if ($senha == false) {

    $update = updateSession2('tbusuarios', $nome, $tel, $email, $_SESSION['dadosUser']['id']);

    if ($update == 'Atualizado') {
        echo json_encode('OK');
        die();
    } else if ($update == 'nAtualizado') {
        echo json_encode('Não foi possível atualizar os dados.');
        die();
    } else {
        echo json_encode('Ocorreu um erro no servidor ao tentar atualizar os dados.');
        die();
    }

} else {

    $update = updateSession1('tbusuarios', $nome, $tel, $email, $senha, $_SESSION['dadosUser']['id']);

    if ($update == 'Atualizado') {
        echo json_encode('OK');
        die();
    } else if ($update == 'nAtualizado') {
        echo json_encode('Não foi possível atualizar os dados.');
        die();
    } else {
        echo json_encode('Ocorreu um erro no servidor ao tentar atualizar os dados.');
        die();
    }

}


?>