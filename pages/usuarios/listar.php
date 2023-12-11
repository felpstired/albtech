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
                    <h1>Gerenciamento de Usuários</h1>
                    <a href="#">
                        <h4>Registrar novo Usuário</h4>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="corpoListar mt-4">

        <div class="pesquisaLista">
            <form action="#" method="post" id="listaSearch" name="listaSearch">

                <div class="row">

                    <div class="d-none d-sm-none d-md-none d-lg-none d-xl-block d-xxl-block col-xl-4 col-xxl-3">
                        <div class="alinharVH d-flex align-items-center justify-content-center">
                            <label for="tipopesquisa">Pesquisar por: </label>
                            <select name="tipopesquisa" id="tipopesquisa" required>
                                <option value="0" selected>Livro - Título</option>
                                <option value="1">Livro - ISBN</option>
                                <option value="2">Usuário - Nome</option>
                                <option value="3">Usuário - CPF</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-xl-4 col-xxl-6">
                        <div class="alinharVH d-flex align-items-center justify-content-center column-gap-3">
                            <input type="text" name="textoPesquisa" placeholder="Pesquise aqui..." maxlength="180" required>
                            <button type="submit"><span class="mdi mdi-magnify"></span></button>
                        </div>
                    </div>

                    <div class="d-none d-sm-none d-md-none d-lg-none d-xl-block d-xxl-block col-xl-4 col-xxl-3">
                        <div class="alinharVH d-flex align-items-center justify-content-center">
                            <label for="filtropesquisa">Filtrar por: </label>
                            <select name="filtropesquisa" id="filtropesquisa" required>
                                <option value="0" selected>Mais Recente</option>
                                <option value="1">Mais Antigo</option>
                                <option value="2">Ordem A-Z</option>
                                <option value="3">Ordem Z-A</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-6 d-none d-sm-block d-md-block d-lg-block d-xl-none d-xxl-none">
                        <div class="alinharVH d-flex align-items-center justify-content-center">
                            <label for="tipopesquisa"><span>Pesquisar por: </span></label>
                            <select name="tipopesquisa" id="tipopesquisa" required>
                                <option value="1">Usuário - Nome</option>
                                <option value="2">Usuário - CPF</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 d-none d-sm-block d-md-block d-lg-block d-xl-none d-xxl-none">
                        <div class="alinharVH d-flex align-items-center justify-content-center">
                            <label for="filtropesquisa">Filtrar por: </label>
                            <select name="filtropesquisa" id="filtropesquisa" required>
                                <option value="0" selected>Mais Recente</option>
                                <option value="1">Mais Antigo</option>
                                <option value="2">Ordem A-Z</option>
                                <option value="3">Ordem Z-A</option>
                            </select>
                        </div>
                    </div>

                </div>

            </form>
        </div>

        <div id="contentTable" class="dashboardLista mt-5">
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
                <h3 class="modal-title"><span class="mdi mdi-account-plus"></span> Novo Registro de Usuário</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="#" method="post" id="frmAddUser" name="frmAddUser">

                <div class="modal-body fs-5">

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
                            <textarea class="form-control" id="livroDesc" name="livroDesc" placeholder="Insira a descrição do livro" rows="3" required></textarea>
                        </div>
                    
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>

            </form>

        </div>
    </div>
</div>