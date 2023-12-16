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
                    <h1>Gerenciamento de Administradores</h1>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddAdm">
                        <h4>Registrar novo Administrador</h4>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="corpoListar mt-4">

        <div id="contentTable" class="dashboardLista mt-3">
            <?php

            include_once 'listarTable.php';

            ?>
        </div>

    </div>

</div>

<div class="modal fade" tabindex="-1" id="modalAddAdm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h3 class="modal-title"><span class="mdi mdi-account-plus"></span> Novo Registro de Administrador</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="#" method="post" id="frmAddAdm" name="frmAddAdm">

                <div class="modal-body fs-5">

                    <div class="mb-3">
                        <label for="nomeAddAdm" class="form-label"><span class="mdi mdi-account"></span>Selecione o usuário para ser Administrador:</label>
                        <select class="form-select" id="nomeAddAdm" name="nomeAddAdm" required>
                            <?php

                            $listarUsers = listarGeral('idusuarios, nome', 'tbusuarios');

                            if ($listarUsers == 'Vazio') {

                            ?>

                                <option selected>Sem opções!</option>

                            <?php

                            } else {

                            ?>

                                <option selected>Selecione o tipo</option>

                                <?php

                                foreach ($listarUsers as $users) {

                                    $idUsers = $users->idusuarios;

                                    $listarADM = listarRegistrosInt('idadm', 'tbadm', 'idusuarios', $idUsers);

                                    if ($listarADM != 'Vazio') {

                                        continue;

                                    }

                                    $nomeUsers = $users->nome;

                                ?>

                                    <option value="<?php echo $idUsers; ?>"><?php echo $nomeUsers; ?></option>

                            <?php

                                }
                            }

                            ?>
                        </select>
                    </div>

                </div>
                <div id="errorMsg" class="form-text text-danger"></div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" onclick="addAdm();">Cadastrar Administrador</button>
                </div>

            </form>

        </div>
    </div>
</div>