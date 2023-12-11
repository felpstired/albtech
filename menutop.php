<div id="headerNav">

    <nav class="navbar navbar-dark bg-dark pt-2 pb-2">
        <div class="container-fluid">
            <div class="row w-100 text-white">
                <div class="col-md-4 d-none d-sm-none d-md-block m-auto ps-4">
                    <h3>Bem-vindo(a) <?php echo $_SESSION['dadosUser']['nome']; ?></h3>
                </div>
                <div class="col-md-4 col-sm-6 col-6 d-flex justify-content-center align-items-center">
                    <a class="nav-link linkMenu" idMenu="home" href="#">
                        <h2>BIBLIOTECA</h2>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 col-6 d-flex justify-content-end align-items-center">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </div>



        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header mt-3">
                <div class="userInfo ps-2">
                    <div class="row">
                        <div class="col-3">
                            <img src="./assets/img/logo.png" alt="">
                        </div>
                        <div class="col-9">
                            <h3><?php echo $_SESSION['dadosUser']['nome']; ?></h3>
                            <a href="#" class="linkMenu" idMenu="">Alterar Dados</a>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 text-center">
                    <a class="nav-link linkMenu" idMenu="home" href="#">
                        <li class="nav-item row text-center align-items-center">

                            <div class="col-3 text-end">
                                <span class="mdi mdi-home"></span>
                            </div>
                            <div class="col-9 fs-5">
                                Home
                            </div>
                        </li>
                    </a>
                    <hr>
                    <a class="nav-link linkMenu" idMenu="pageEmp" href="#">
                        <li class="nav-item row text-center align-items-center">

                            <div class="col-3 text-end">
                                <span class="mdi mdi-book-open-blank-variant"></span>
                            </div>
                            <div class="col-9 fs-5">
                                Empréstimos
                            </div>
                        </li>
                    </a>
                    <hr>
                    <a class="nav-link linkMenu" idMenu="pageDev" href="#">
                        <li class="nav-item row text-center align-items-center">

                            <div class="col-3 text-end">
                                <span class="mdi mdi-bookmark-check"></span>

                            </div>
                            <div class="col-9 fs-5">
                                Devoluções
                            </div>
                        </li>
                    </a>
                    <hr>
                    <a class="nav-link linkMenu" idMenu="pageLiv" href="#">
                        <li class="nav-item row text-center align-items-center">

                            <div class="col-3 text-end">
                                <span class="mdi mdi-bookshelf"></span>
                            </div>
                            <div class="col-9 fs-5">
                                Livros
                            </div>
                        </li>
                    </a>
                    <hr>
                    <a class="nav-link linkMenu" idMenu="pageTLiv" href="#">
                        <li class="nav-item row text-center align-items-center">

                            <div class="col-3 text-end">
                                <span class="mdi mdi-bookmark-box-multiple"></span>
                            </div>
                            <div class="col-9 fs-5">
                                Tipos de Livro
                            </div>
                        </li>
                    </a>
                    <hr>
                    <a class="nav-link linkMenu" idMenu="pageUser" href="#">
                        <li class="nav-item row text-center align-items-center">

                            <div class="col-3 text-end">
                                <span class="mdi mdi-account-group"></span>
                            </div>
                            <div class="col-9 fs-5">
                                Usuários
                            </div>
                        </li>
                    </a>
                    <hr>
                    <a class="nav-link linkMenu" idMenu="pageAdm" href="#">
                        <li class="nav-item row text-center align-items-center">

                            <div class="col-3 text-end">
                                <span class="mdi mdi-badge-account-horizontal-outline"></span>
                            </div>
                            <div class="col-9 fs-5">
                                Administradores
                            </div>
                        </li>
                    </a>
                    <hr>
                    <a class="nav-link linkMenu" idMenu="pageLog" href="#">
                        <li class="nav-item row text-center align-items-center">

                            <div class="col-3 text-end">
                                <span class="mdi mdi-post"></span>
                            </div>
                            <div class="col-9 fs-5">
                                Log de Eventos
                            </div>
                        </li>
                    </a>
                    <hr>
                    <a class="nav-link" href="#" onclick="Logout();">
                        <li class="nav-item row text-center align-items-center">

                            <div class="col-3 text-end">
                                <span class="mdi mdi-logout"></span>
                            </div>
                            <div class="col-9 fs-5">
                                Sair
                            </div>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </nav>

</div>