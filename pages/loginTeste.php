<?php
//
//include_once '../config/constantes.php';
//include_once '../config/conexao.php';
//include_once '../functions/dashboard.php';
//
//// $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//
//$dados['emailLogin'] = 'analu23adm@gmail.com';
//$dados['senhaLogin'] = 'analuadm1234';
//
//if (isset($dados['emailLogin']) && !empty($dados['emailLogin'])) {
//    $email = $dados['emailLogin'];
//} else {
//    echo json_encode('Campos não preenchidos ou inexistentes.');
//    die();
//}
//
//$existeEmail = listarRegistrosStr('senha', 'usuarios', 'email', $email);
//
//// echo $existeEmail;
//
//// echo json_encode($existeEmail);
//
//if ($existeEmail == 'Vazio') {
//    echo json_encode('E-mail não cadastrado.');
//    die();
//} else {
//    foreach ($existeEmail as $listarSenha) {
//        $senhaBanco = $listarSenha->senha;
//    }
//}
//
//// echo $senhaBanco;
//
//// echo password_verify('analuadm1234', $senhaBanco);
//
//if (isset($dados['senhaLogin']) && !empty($dados['senhaLogin'])) {
//    $senha = $dados['senhaLogin'];
//} else {
//    echo json_encode('Campos não preenchidos ou inexistentes.');
//    die();
//}
//
//if (!password_verify($senha, $senhaBanco)) {
//    echo json_encode('E-mail e/ou senha incorretos.');
//    die();
//}
//
//echo (password_verify($senha, $senhaBanco)).' ';
//
//echo $email.' ';
//echo $senha.' ';
//
//$checarDados = checarLoginEmail('idusuarios, nome, telefone, cpf, email, senha, pontuacao, cadastro, alteracao, ativo', 'usuarios', $email, $senhaBanco);
//
//
//
//echo var_dump($checarDados).' ';
//
//// if ($checarDados == 'false') {
////     echo json_encode('E-mail e/ou senha incorretos.');
////     die();
//// } else {
//
////     foreach ($checarDados as $itemDados) {
//
////         $_SESSION['dadosUser'] = array(
////             "id" => $itemId->idusuarios,
////             "nome" => $itemId->nome,
////             "telefone" => $itemId->telefone,
////             "cpf" => $itemId->cpf,
////             "email" => $itemId->email,
////             "pontuacao" => $itemId->pontuacao,
////             "cadastro" => $itemId->cadastro,
////             "alteracao" => $itemId->alteracao,
////             "ativo" => $itemId->ativo
////         );
////     }
//
////     echo json_encode('OK');
////     die();
//// }

$senha = 'analuadm1234';

echo password_hash($senha, PASSWORD_BCRYPT);

echo '<br>';

$abc = '9999-999';
$def = str_replace('-', '', $abc);

echo $abc . '<br>';
echo $def;

?>

<!--<form action="loginTeste.php" method="post">-->
<!--    <input type="date" name="inputData">-->
<!--    <button type="submit">Enviar</button>-->
<!--</form>-->
<!---->
<?php
//
//if (!empty($_POST['inputData'])) {
//    $data = $_POST['inputData'];
//    echo $data;
//}

?>