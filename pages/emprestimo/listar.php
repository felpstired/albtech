<div class="listarPageGeral mb-3">

    <div class="headerListar">

        <div class="row">
            <div class="col-4 col-sm-4 col-md-4">
                <div class="alinharVH d-flex align-items-center justify-content-center">
                    <img src="assets/img/logo1.png" alt="imgLogo">
                </div>
            </div>
            <div class="col-8 col-sm-8 col-md-8">
                <div class="alinharVH d-flex justify-content-center flex-column">
                    <h1>Gerenciamento de Empréstimos</h1>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddEmp">
                        <h4>Registrar novo Empréstimo</h4>
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

<div class="modal fade" tabindex="-1" id="modalAddEmp" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h3 class="modal-title">Novo Registro de Empréstimo</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body fs-5">

                <form action="#" method="post" id="frmAddEmp" name="frmAddEmp">

                    <div class="divAddInfoEmp">

                        <div class="mb-3">
                            <label for="empUser" class="form-label">Usuário:</label>

                            <select class="form-select" id="empUser" name="empUser" required>
                                <?php

                                $listarUser = listarGeral('idusuarios, nome', 'tbusuarios');

                                if ($listarUser == 'Vazio') {

                                ?>

                                    <option selected>Sem opções!</option>

                                <?php

                                } else {

                                ?>

                                    <option selected>Selecione o tipo</option>

                                    <?php

                                    foreach ($listarUser as $user) {

                                        $idUser = $user->idusuarios;
                                        $nomeUser = $user->nome;

                                    ?>

                                        <option value="<?php echo $idUser; ?>"><?php echo $nomeUser; ?></option>

                                <?php

                                    }
                                }

                                ?>
                            </select>

                        </div>

                        <div class="row">
                            <div class="mb-3 col-sm-12 col-md-6">
                                <label for="empLivro" class="form-label">Livro Emprestado:</label>
                                <select class="form-select" id="empLivro" name="empLivro" required>
                                    <?php

                                    $listarLivro = listarGeral('idlivro, titulo', 'tblivro');

                                    if ($listarLivro == 'Vazio') {

                                    ?>

                                        <option selected>Sem opções!</option>

                                    <?php

                                    } else {

                                    ?>

                                        <option selected>Selecione o tipo</option>

                                        <?php

                                        foreach ($listarLivro as $livro) {

                                            $idLivro = $livro->idlivro;
                                            $titulo = $livro->titulo;

                                        ?>

                                            <option value="<?php echo $idLivro; ?>"><?php echo $titulo; ?></option>

                                    <?php

                                        }
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="mb-3 col-sm-12 col-md-6">
                                <label for="empDev" class="form-label">Data de Devolução:</label>
                                <input type="date" class="form-control" id="empDev" name="empDev" placeholder="AAAA/MM/DD" min="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success" onclick="addEmp();">Cadastrar Empréstimo</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>