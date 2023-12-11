<?php

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './functions/dashboard.php';

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

        foreach ($listar as $itemLista) {
            $id = $itemLista->idusuarios;
            $nome = $itemLista->nome;
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
                    <button type="button" class="btn btn-primary"><span class="mdi mdi-pencil"></span></button>
                    <button type="button" class="btn btn-danger" onclick="msgDelete(<?php echo $id; ?>, 'delUser', 'listarUser');"><span class="mdi mdi-delete"></span></button>
                </td>
            </tr>

            <?php

        }

    }

    ?>

    </tbody>
</table>

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
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

        </div>
    </div>
</div>
