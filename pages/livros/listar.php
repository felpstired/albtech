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
                    <h1>Gerenciamento de Livros</h1>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddLivro">
                        <h4>Registrar novo Livro</h4>
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

<div class="modal fade" tabindex="-1" id="modalAddLivro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h3 class="modal-title">Novo Registro de Livro</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>



            <div class="modal-body fs-5">
                <form action="#" method="post" id="frmISBN" name="frmISBN">
                    <div class="mb-3" id="inputISBN">
                        <label for="livroISBN" class="form-label">ISBN:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="livroISBN" name="livroISBN" placeholder="Insira o ISBN" maxlength="14">
                            <button type="submit" class="btn btn-primary botaoISBN" onclick="procurarLivro();">Procurar Livro <span class="mdi mdi-magnify"></span></button>
                        </div>
                        <div id="errorMsg" class="form-text text-danger"></div>
                    </div>
                </form>

                <form action="#" method="post" id="frmAddLiv" name="frmAddLiv">

                    <div class="divAddInfoEmp">

                        <hr>

                        <input type="text" class="form-control d-none" id="livroISBNForm" name="livroISBNForm" maxlength="14">

                        <div class="row">
                            <div class="mb-3 col-sm-12 col-md-6">
                                <label for="livroTitulo" class="form-label">Titulo:</label>
                                <input type="text" class="form-control" id="livroTitulo" name="livroTitulo" placeholder="Insira o título do livro" required>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6">
                                <label for="livroAutor" class="form-label">Autor(a):</label>
                                <input type="text" class="form-control" id="livroAutor" name="livroAutor" placeholder="Informe o(s) autor(es) do livro" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="livroDesc" class="form-label">Descrição:</label>
                            <textarea class="form-control" id="livroDesc" name="livroDesc" placeholder="Insira a descrição do livro" rows="5" required></textarea>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-sm-12 col-md-4">
                                <label for="livroPubli" class="form-label">Data de Publicação:</label>
                                <input type="date" class="form-control" id="livroPubli" name="livroPubli" placeholder="AAAA/MM/DD" max="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-4">
                                <label for="livroCopias" class="form-label">Quantidade de Cópias:</label>
                                <input type="text" class="form-control maskNumber" id="livroCopias" name="livroCopias" placeholder="Insira a quantidade de cópias" required>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-4">
                                <label for="livroTipo" class="form-label">Tipo de Arquivo:</label>
                                <select class="form-select" id="livroTipo" name="livroTipo" required>
                                    <?php

                                    $listarTipo = listarGeral('idtipoLivro, tipoLivro', 'tbtipolivro');

                                    if ($listarTipo == 'Vazio') {

                                    ?>

                                        <option selected>Sem opções!</option>

                                    <?php

                                    } else {

                                    ?>

                                        <option selected>Selecione o tipo</option>

                                        <?php

                                        foreach ($listarTipo as $tipo) {

                                            $idTipo = $tipo->idtipoLivro;
                                            $tipoLiv = $tipo->tipoLivro;

                                        ?>

                                            <option value="<?php echo $idTipo; ?>"><?php echo $tipoLiv; ?></option>

                                    <?php

                                        }
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="livroLink" class="form-label">Capa (Link):</label>
                            <input type="text" class="form-control" id="livroLink" name="livroLink" placeholder="Insira o link com a capa do livro" required>
                        </div>

                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" onclick="addLivro();">Cadastrar Livro</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script>
    const modalLivro = document.getElementById('modalAddLivro');
    const inputISBN = document.getElementById('livroISBN');

    modalLivro.addEventListener('shown.bs.modal', () => {
        inputISBN.focus();
    })
</script>