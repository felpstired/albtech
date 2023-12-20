<?php

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './functions/dashboard.php';

$linhas = 5;

if (!isset($_SESSION['numPage'])) {
    $_SESSION['numPage'] = 1;
}

$pageInicial = ($_SESSION['numPage'] - 1) * $linhas;

$listarPagi = listarLimit('tbemprestimo', 'idemprestimo, idlivro, idusuarios, datadevolucao, cadastro, ativo', $pageInicial, $linhas);
// echo var_dump($listarPagi);

$contReg = contadorRegistroTodos('tbemprestimo');
// echo var_dump($contReg);

$totalPages = ceil($contReg / $linhas);
// echo $totalPages;

// $listar = listarGeral('idusuarios, nome, telefone, email, cadastro', 'tbusuarios');

?>

<table class="table table-hover table-stripped table-borderless text-center rounded-5">
    <thead class="table-dark">
        <tr>
            <th scope="col" width="5%">ID</th>
            <th scope="col" width="15%">Livro Emprestado</th>
            <th scope="col" width="15%">Usuário</th>
            <th scope="col" width="10%">Empréstimo</th>
            <th scope="col" width="20%">Previsão de Devolução</th>
            <th scope="col" width="15%">Ações</th>
        </tr>
    </thead>
    <tbody>

        <?php

        if ($listarPagi == 'Vazio') {

        ?>

            <tr>
                <th colspan="8">
                    <div class="alert-danger" role="alert">
                        Não há registros no banco!
                    </div>
                </th>
            </tr>

            <?php

        } else {

            foreach ($listarPagi as $itemLista) {
                $idemp = $itemLista->idemprestimo;
                $idlivro = $itemLista->idlivro;
                $iduser = $itemLista->idusuarios;

                $dateD = date_create($itemLista->datadevolucao);
                $dataDevol = date_format($dateD, 'd/m/Y');

                $date = date_create($itemLista->cadastro);
                $dataCad = date_format($date, 'd/m/Y');

                $status = $itemLista->ativo;

            ?>

                <tr>
                    <th scope="row"><?php echo $idemp; ?></th>
                    <td>
                        <?php

                        $listarLivro = listarRegistroUInt('tblivro', 'titulo', 'idlivro', $idlivro);

                        if ($listarLivro != 'Vazio') {

                            foreach ($listarLivro as $itemLista) {
                                $titulo = $itemLista->titulo;
                            }

                            echo $titulo;
                        }

                        ?>
                    </td>
                    <td>
                        <?php

                        $listarUser = listarRegistroUInt('tbusuarios', 'nome', 'idusuarios', $idlivro);

                        if ($listarUser != 'Vazio') {

                            foreach ($listarUser as $itemLista) {
                                $nome = $itemLista->nome;
                            }

                            echo $nome;
                        }

                        ?>
                    </td>
                    <td><?php echo $dataCad; ?></td>
                    <td><?php echo $dataDevol; ?></td>
                    <td>
                        <?php

                        if ($status == 'A') {

                        ?>

                            <button type="button" class="btn btn-secondary" onclick="verEmp('modalVerEmp');"><span class="mdi mdi-dots-horizontal"></span></button>

                            <button type="button" class="btn btn-success"><span class="mdi mdi-book-arrow-right"></span></button>

                        <?php

                        } else {

                        ?>

                            Devolvido

                        <?php

                        }

                        ?>

                        <!-- <button type="button" class="btn btn-danger" onclick="msgDelete(<?php // echo $id; 
                                                                                                ?>, 'delLivro', 'listarLivro');"><span class="mdi mdi-delete"></span></button> -->
                    </td>
                </tr>

        <?php

            }
        }

        ?>

    </tbody>
</table>
<div class="pagination <?php if ($contReg <= 5) {
                            echo 'd-none';
                        } ?>">
    <div class="divPagi">
        <span>Página <b><?php echo $_SESSION['numPage']; ?></b> de <b><?php echo $totalPages; ?></b></span>
    </div>
    <div class="divPagi">
        <ul>
            <li class="<?php if ($_SESSION['numPage'] == 1) {
                            echo 'd-none';
                        } ?>">
                <a href="#" class="linkPagi" idPagi="<?php echo 1; ?>">
                    <span class="mdi mdi-skip-backward"></span> Primeira Página
                </a>
            </li>
            <li class="<?php if ($_SESSION['numPage'] == 1) {
                            echo 'd-none';
                        } ?>">
                <a href="#" class="linkPagi" idPagi="<?php echo $_SESSION['numPage'] - 1; ?>">
                    <span class="mdi mdi-skip-previous"></span> Anterior
                </a>
            </li>
            <?php

            for ($i = 1; $i < ($totalPages + 1); $i++) {

            ?>

                <li>
                    <a href="#" class="linkPagi" idPagi="<?php echo $i; ?>">
                        <span><b><?php echo $i; ?></b></span>
                    </a>
                </li>

            <?php

            }

            ?>

            <li class="<?php if ($_SESSION['numPage'] == $totalPages) {
                            echo 'd-none';
                        } ?>">
                <a href="#" class="linkPagi" idPagi="<?php echo $_SESSION['numPage'] + 1; ?>">
                    Próxima <span class="mdi mdi-skip-next"></span>
                </a>
            </li>
            <li class="<?php if ($_SESSION['numPage'] == $totalPages) {
                            echo 'd-none';
                        } ?>">
                <a href="#" class="linkPagi" idPagi="<?php echo $totalPages; ?>">
                    Última Página <span class="mdi mdi-skip-forward"></span>
                </a>
            </li>
        </ul>
    </div>

</div>

<!--  // MODAL DE VER MAIS //  -->
<div class="modal fade" tabindex="-1" id="modalVerEmp" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h3 class="modal-title"><span class="mdi mdi-account-box"></span> Mais informações</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="row row-cols-3 gap-0 row-gap-3 mt-3 mb-3" id="infoEmpMais">

                    <div class="col fs-5">
                        <span class="fw-bold">ID:</span>ﾠ<span id="idEmpMais"></span>
                    </div>
                    <div class="col fs-5">
                        <span class="fw-bold"><span class="mdi mdi-book-cog"></span> Usuário:</span>ﾠ<span id="userEmpMais"></span>
                    </div>
                    <div class="col fs-5">
                        <span class="fw-bold">
                            <span class="mdi mdi-help-box-multiple"></span> Livro:</span>ﾠ<span id="livroEmpMais"></span>
                    </div>
                    <div class="col fs-5">
                        <span class="fw-bold">
                            <span class="mdi mdi-tag-text"></span> Autor:</span>ﾠ<span id="autorEmpMais"></span>
                    </div>
                    <div class="col fs-5">
                        <span class="fw-bold"><span class="mdi mdi-account-star"></span> Empréstimo:</span>ﾠ<span id="dataEmpMais"></span>
                    </div>
                    <div class="col fs-5">
                        <span class="fw-bold">
                            <span class="mdi mdi-publish"></span> Previsão Devolução:</span>ﾠ<span id="devEmpMais"></span>
                    </div>
                    <div class="col fs-5">
                        <span class="fw-bold"><span class="mdi mdi-book-multiple"></span> Status:</span>ﾠ<span id="sttsEmpMais"></span>
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
            </div>

        </div>
    </div>
</div>