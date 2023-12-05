<!doctype html>
<html lang="pt-BR">

<head>

    <?php

    // Incluindo arquivos com as funções necessárias para o funcionamento do site
    include_once './config/constantes.php';
    include_once './config/conexao.php';
    include_once './functions/dashboard.php';
    // include_once './functions/functions.php';

    ?>

    <!-- 
    Essa tag é usada para definir o link do site, mas não será usada
    Ela está aqui apenas para fins de teste
    -->
    <!-- <base href="index.php" target=""> -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicons (icones que aparecem na aba do site) -->
    <link href="assets/img/logo/favicon/favicon.ico" rel="icon">
    <link href="assets/img/logo/favicon/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- conteúdo importante para o navegador (aparece nos resultados de pesquisa) -->
    <meta content="Traços que falam, cores que emocionam. vapocom." name="description">
    <meta content="arte, desenho, artistas, comissão, comissões, pintura, venda, compra, loja, vendedor, parceiros" name="keywords">

    <!-- links para as fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="./assets/css/fontesGoogle.css" rel="stylesheet">

    <!-- link para os icons -->
    <link rel="stylesheet" type="text/css" href="./assets/css/mdiIcons.css">

    <!-- link para o css do bootstrap -->
    <link href="./assets/css/bootstrap.css" rel="stylesheet">

    <!-- link para o nosso css -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <?php

    // if ($_SESSION['page']) {

    // }


    ?>

    <!-- titulo da página -->
    <title>Gerenciamento de Biblioteca</title>

</head>

<body>

    <div id="content">

        <?php

        if (!empty($_SESSION['pages'])) {
            switch ($_SESSION['pages']) {
                case 'home':
                    include_once './home.php';
                    break;
                default:
                    include_once './home.php';
                    break;
            }
        } else {

        ?>

            <div class="divForm text-center text-white p-5">
                <div class="imgForm">
                    <img src="./assets/img/logo.png" alt="logoSite">
                </div>

                <form action="#" method="post" id="frmLogin" name="frmLogin">

                    <div class="camposForm mb-3">

                        <h1>LOGIN</h1>

                        <input type="email" name="emailLogin" placeholder="E-mail" maxlength="60" required>
                        <input type="password" name="senhaLogin" placeholder="Senha" maxlength="30" required>

                    </div>

                    <div class="footerForm">
                        <button type="submit" class="mb-3" onclick="Login();">Entrar</button>

                        <!-- <p>Não possui uma conta? <a href="./index2.php">Cadastre-se</a></p> -->
                    </div>

                </form>
            </div>

        <?php

        }

        ?>

    </div>



    <!-- links para os javascripts do bootstrap -->
    <script src="./assets/js/bootstrap.js"></script>

    <!-- link do jquery -->
    <script src="./assets/js/jquery.js"></script>

    <!-- link da mascara (que usa jquery) -->
    <script src="./assets/js/maskJquery.js"></script>

    <!-- link para os alerts customizados -->
    <script src="./assets/js/sweetAlert.js"></script>

    <!-- link para nosso script -->
    <script src="./assets/js/script.js"></script>

</body>

</html>