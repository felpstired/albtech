<?php

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './functions/dashboard.php';

$linhas = 5;

if (!isset($_SESSION['numPage'])) {
    $_SESSION['numPage'] = 1;
}

$pageInicial = ($_SESSION['numPage'] - 1) * $linhas;

$listarPagi = listarLimit('tbusuarios', 'idusuarios, nome, telefone, email, cadastro', $pageInicial, $linhas);
// echo var_dump($listarPagi);

$contReg = contadorRegistroTodos('tbusuarios');
// echo var_dump($contReg);

$totalPages = ceil($contReg / $linhas);
// echo $totalPages;

$listar = listarGeral('idusuarios, nome, telefone, email, cadastro', 'tbusuarios');

?>

<table class="table table-hover table-stripped table-borderless text-center rounded-5">
    <thead class="table-dark">
        <tr>
            <th scope="col" width="5%">ID</th>
            <th scope="col" width="15%">Usuário</th>
            <th scope="col" width="18%">E-mail</th>
            <th scope="col" width="18%">Telefone</th>
            <th scope="col" width="18%" class="showtd">Cadastro</th>
            <th scope="col" width="14%">Ações</th>
        </tr>
    </thead>
    <tbody>

        <?php

        if ($listar == 'Vazio') {

        ?>

            <tr>
                <th rowspan="6" class="alert-danger" role="alert">Não há registros no banco!</th>
            </tr>

            <?php

        } else {

            foreach ($listarPagi as $itemLista) {
                $id = $itemLista->idusuarios;

                $nome = explode(' ', trim($itemLista->nome))[0];

                $email = $itemLista->email;
                $tel = $itemLista->telefone;

                $date = date_create($itemLista->cadastro);
                $dataCad = date_format($date, 'd/m/Y');

            ?>

                <tr>
                    <th scope="row"><?php echo $id; ?></th>
                    <td><?php echo $nome; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $tel; ?></td>
                    <td><?php echo $dataCad; ?></td>
                    <td>
                        <button type="button" class="btn btn-secondary" onclick="verUser(<?php echo $id; ?>, 'modalMaisUser');"><span class="mdi mdi-dots-horizontal"></span></button>
                        <?php

                        if ($id != $_SESSION['dadosUser']['id']) {



                        ?>
                            <button type="button" class="btn btn-primary"><span class="mdi mdi-pencil"></span></button>

                        <?php

                        }

                        ?>

                        <button type="button" class="btn btn-danger" onclick="msgDelete(<?php echo $id; ?>, 'delUser', 'listarUser');"><span class="mdi mdi-delete"></span></button>
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
<div class="modal fade" tabindex="-1" id="modalMaisUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h3 class="modal-title"><span class="mdi mdi-account-box"></span> Mais informações</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="row row-cols-3 gap-0 row-gap-3 mt-3 mb-3" id="infoUserMais">

                    <div class="col fs-5">
                        <span class="fw-bold">ID:</span>ﾠ<span id="idUserMais"></span>
                    </div>
                    <div class="col fs-5">
                        <span class="fw-bold">
                            <span class="mdi mdi-information-outline"></span> Status:</span>ﾠ<span id="statusUserMais"></span>
                    </div>
                    <div class="col fs-5">
                        <span class="fw-bold"><span class="mdi mdi-counter"></span> Pontuação:</span>ﾠ<span id="pontUserMais"></span>
                    </div>
                    <div class="col fs-5">
                        <span class="fw-bold">
                            <span class="mdi mdi-account"></span> Nome:</span>ﾠ<span id="nomeUserMais"></span>
                    </div>
                    <div class="col fs-5">
                        <span class="fw-bold"><span class="mdi mdi-phone"></span> Telefone:</span>ﾠ<span id="telUserMais"></span>
                    </div>
                    <div class="col fs-5">
                        <span class="fw-bold">
                            <span class="mdi mdi-card-account-details"></span> CPF:</span>ﾠ<span id="cpfUserMais"></span>
                    </div>
                    <div class="col fs-5">
                        <span class="fw-bold"><span class="mdi mdi-at"></span> E-mail:</span>ﾠ<span id="emailUserMais"></span>
                    </div>
                    <div class="col fs-5">
                        <span class="fw-bold"><span class="mdi mdi-account-check"></span> Cadastro:</span>ﾠ<span id="cadUserMais"></span>
                    </div>
                    <div class="col fs-5">
                        <span class="fw-bold">
                            <span class="mdi mdi-clock-edit"></span> Última alteração:</span>ﾠ<span id="altUserMais"></span>
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
            </div>

        </div>
    </div>
</div>



<!--  // MODAL DE ALTERAÇÃO //  -->
<div class="modal fade" tabindex="-1" id="modalAltUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h3 class="modal-title"><span class="mdi mdi-account-plus"></span> Novo Registro de Usuário</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="#" method="post" id="frmAltUser" name="frmAltUser">

                <div class="modal-body fs-5">

                    <div class="mb-3">
                        <label for="nomeAltUser" class="form-label"><span class="mdi mdi-account"></span> Nome:</label>
                        <input type="text" class="form-control" id="nomeAltUser" name="nomeAltUser" placeholder="Insira seu nome..." maxlength="120" required>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label for="cpfAltUser" class="form-label"><span class="mdi mdi-card-account-details-star"></span> CPF:</label>
                            <input type="text" class="form-control maskCPF" id="cpfAltUser" name="cpfAltUser" placeholder="123.456.789-10" maxlength="120" required>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label for="telAltUser" class="form-label"><span class="mdi mdi-phone"></span> Telefone:</label>
                            <input type="text" class="form-control maskTelefone" id="telAltUser" name="telAltUser" placeholder="(33) 9 9999-9999" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="emailAltUser" class="form-label"><span class="mdi mdi-at"></span> E-mail:</label>
                        <input type="email" class="form-control" id="emailAltUser" name="emailAltUser" placeholder="Insira seu email..." required>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label for="senhaAltUser" class="form-label"><span class="mdi mdi-lock"></span> Senha:</label>
                            <input type="password" class="form-control" id="senhaAltUser" name="senhaAltUser" placeholder="Digite uma senha..." maxlength="120" required>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label for="senhaAltUser2" class="form-label"><span class="mdi mdi-lock-alert"></span> Repita sua senha:</label>
                            <input type="password" class="form-control" id="senhaAltUser2" name="senhaAltUser2" placeholder="Confirme sua senha..." required>
                        </div>
                    </div>
                    <div id="errorMsg" class="form-text text-danger"></div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" onclick="altUser();">Cadastrar Usuário</button>
                </div>

            </form>

        </div>
    </div>
</div>