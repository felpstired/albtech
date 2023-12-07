<?php

if (empty($_SESSION['dadosUser'])) {

    header("refresh:0; url=./index.php");
    die();
}

?>
<div class="body">

    <?php

    // Arquivo com a navbar do site
    include_once './menutop.php';

    ?>

    <div id="corpo">
        <div class="corp">

            <div id="contentHome">

                <?php

                if (!empty($_SESSION['pages']) && ($_SESSION['pages'] != 'home')) {
                    switch ($_SESSION['pages']) {
                        case 'pageEmp':
                            include_once './pages/emprestimo/listar.php';
                            break;
                        case 'pageDev':
                            include_once './pages/devolucao/listar.php';
                            break;
                        case 'pageLiv':
                            include_once './pages/livros/listar.php';
                            break;
                        case 'pageTLiv':
                            include_once './pages/tlivros/listar.php';
                            break;
                        case 'pageUser':
                            include_once './pages/usuarios/listar.php';
                            break;
                        case 'pageAdm':
                            include_once './pages/adm/listar.php';
                            break;
                        case 'pageLog':
                            include_once './pages/log.php';
                            break;
                    }
                } else {

                ?>

                    <div class="listarPageGeral mb-3">

                        <div class="headerListar">

                            <div class="row">
                                <div class="col-4 col-sm-4 col-md-4">
                                    <div class="alinharVH d-flex align-items-center justify-content-center">
                                        <img src="assets/img/logo.png" alt="imgLogo">
                                    </div>
                                </div>
                                <div class="col-8 col-sm-8 col-md-8">
                                    <div class="alinharVH d-flex justify-content-center flex-column">
                                        <h1>Gerenciamento de Biblioteca</h1>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="corpoListar corpoListarHome mt-4 text-center">

                            <div class="textoHome">
                                <h1>Nenhum menu selecionado ainda!</h1>

                                <h4>
                                    Selecione um menu ( <span class="mdi mdi-menu"></span> ) para começar a navegar
                                </h4>
                            </div>

                        </div>

                    </div>

                <?php

                }

                ?>

            </div>
        </div>

    </div>

    <?php

    // Arquivo com o footer do site
    include_once './footer.php';

    ?>

</div>