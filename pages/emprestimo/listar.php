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
                    <h1>Gerenciamento de Empréstimos</h1>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <h4>Registrar novo empréstimo</h4>
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
                                <option value="0" selected>Livro - Título</option>
                                <option value="1">Livro - ISBN</option>
                                <option value="2">Usuário - Nome</option>
                                <option value="3">Usuário - CPF</option>
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

        <div class="dashboardLista mt-5">
            <table class="table table-hover table-stripped table-borderless text-center rounded-5">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" width="5%">ID</th>
                        <th scope="col" width="15%">Usuário</th>
                        <th scope="col" width="30%">Livro</th>
                        <th scope="col" width="18%">Empréstimo</th>
                        <th scope="col" width="18%" class="showtd">Devolução</th>
                        <th scope="col" width="14%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Nove Novena</td>
                        <td>29/10/2023</td>
                        <td class="showtd">10/11/2023</td>
                        <td>
                            <button type="button" class="btn btn-secondary"><span class="mdi mdi-dots-horizontal"></span></button>
                            <button type="button" class="btn btn-primary"><span class="mdi mdi-pencil"></span></button>
                            <button type="button" class="btn btn-danger"><span class="mdi mdi-delete"></span></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Otto</td>
                        <td>Percy Jasckson e o Ladrão de Raios</td>
                        <td>12/10/2023</td>
                        <td class="showtd">15/11/2023</td>
                        <td>
                            <button type="button" class="btn btn-secondary"><span class="mdi mdi-dots-horizontal"></span></button>
                            <button type="button" class="btn btn-primary"><span class="mdi mdi-pencil"></span></button>
                            <button type="button" class="btn btn-danger"><span class="mdi mdi-delete"></span></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Amber</td>
                        <td>Harry Potter e a Pedra Filosofal</td>
                        <td>02/09/2023</td>
                        <td class="showtd">17/10/2023</td>
                        <td>
                            <button type="button" class="btn btn-secondary"><span class="mdi mdi-dots-horizontal"></span></button>
                            <button type="button" class="btn btn-primary"><span class="mdi mdi-pencil"></span></button>
                            <button type="button" class="btn btn-danger"><span class="mdi mdi-delete"></span></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Mark</td>
                        <td>Nove Novena</td>
                        <td>29/10/2023</td>
                        <td class="showtd">10/11/2023</td>
                        <td>
                            <button type="button" class="btn btn-secondary"><span class="mdi mdi-dots-horizontal"></span></button>
                            <button type="button" class="btn btn-primary"><span class="mdi mdi-pencil"></span></button>
                            <button type="button" class="btn btn-danger"><span class="mdi mdi-delete"></span></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Otto</td>
                        <td>Percy Jasckson e o Ladrão de Raios</td>
                        <td>12/10/2023</td>
                        <td class="showtd">15/11/2023</td>
                        <td>
                            <button type="button" class="btn btn-secondary"><span class="mdi mdi-dots-horizontal"></span></button>
                            <button type="button" class="btn btn-primary"><span class="mdi mdi-pencil"></span></button>
                            <button type="button" class="btn btn-danger"><span class="mdi mdi-delete"></span></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Amber</td>
                        <td>Harry Potter e a Pedra Filosofal</td>
                        <td>02/09/2023</td>
                        <td class="showtd">17/10/2023</td>
                        <td>
                            <button type="button" class="btn btn-secondary"><span class="mdi mdi-dots-horizontal"></span></button>
                            <button type="button" class="btn btn-primary"><span class="mdi mdi-pencil"></span></button>
                            <button type="button" class="btn btn-danger"><span class="mdi mdi-delete"></span></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>Mark</td>
                        <td>Nove Novena</td>
                        <td>29/10/2023</td>
                        <td class="showtd">10/11/2023</td>
                        <td>
                            <button type="button" class="btn btn-secondary"><span class="mdi mdi-dots-horizontal"></span></button>
                            <button type="button" class="btn btn-primary"><span class="mdi mdi-pencil"></span></button>
                            <button type="button" class="btn btn-danger"><span class="mdi mdi-delete"></span></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>Otto</td>
                        <td>Percy Jasckson e o Ladrão de Raios</td>
                        <td>12/10/2023</td>
                        <td class="showtd">15/11/2023</td>
                        <td>
                            <button type="button" class="btn btn-secondary"><span class="mdi mdi-dots-horizontal"></span></button>
                            <button type="button" class="btn btn-primary"><span class="mdi mdi-pencil"></span></button>
                            <button type="button" class="btn btn-danger"><span class="mdi mdi-delete"></span></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>Amber</td>
                        <td>Harry Potter e a Pedra Filosofal</td>
                        <td>02/09/2023</td>
                        <td class="showtd">17/10/2023</td>
                        <td>
                            <button type="button" class="btn btn-secondary"><span class="mdi mdi-dots-horizontal"></span></button>
                            <button type="button" class="btn btn-primary"><span class="mdi mdi-pencil"></span></button>
                            <button type="button" class="btn btn-danger"><span class="mdi mdi-delete"></span></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>

<div class="modal fade" tabindex="-1" id="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h3 class="modal-title">Novo Registro de Empréstimo</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="#" method="post" id="frmAddEmp" name="frmAddEmp">

                <div class="modal-body fs-5">
                    <div class="row mb-3" id="inputISBN">
                        <div class="mb-3 col-sm-12 col-md-8">
                            <label for="exampleInputPassword1" class="form-label">ISBN:</label>
                            <input type="text" class="form-control" id="livroISBN" name="livroISBN" maxlength="13">
                        </div>
                        <div class="mb-3 col-md-4 form-check align-items-center d-flex col-sm-12">
                            <input type="checkbox" class="form-check-input me-2" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Não possuo um ISBN</label>
                        </div>
                    </div>

                    <div class="divAddInfoEmp">

                        <hr>

                        <div class="row">
                            <div class="mb-3 col-sm-12 col-md-6">
                                <label for="exampleInputPassword1" class="form-label">Titulo:</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" maxlength="13">
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6">
                                <label for="exampleInputPassword1" class="form-label">Autor(a):</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" maxlength="13">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Sinopse:</label>
                            <textarea class="form-control" placeholder="Leave a comment here" rows="4"></textarea>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-sm-12 col-md-6">
                                <label for="exampleInputPassword1" class="form-label">Data de Publicação:</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" maxlength="13">
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6">
                                <label for="exampleInputPassword1" class="form-label">Quantidade de Cópias:</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" maxlength="13">
                            </div>
                        </div>

                    </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-primary" onclick="procurarLivro();">Procurar Livro</button>
                </div>

            </form>

        </div>
    </div>
</div>