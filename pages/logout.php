<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './functions/dashboard.php';

session_destroy();

echo json_encode('OK');

?>