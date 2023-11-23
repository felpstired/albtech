<div class="listarPageGeral">

    <div class="headerListar">

        <div class="row">
            <div class="col-4 col-sm-4 col-md-3">
                <img src="assets/img/logo.png" alt="imgLogo">
            </div>
            <div class="col-8 col-sm-8 col-md-9 d-flex justify-content-center flex-column ps-5">
                <h1>Gerenciamento de Empréstimos</h1>
                <a href="#">
                    <h4>Registrar novo empréstimo</h4>
                </a>
            </div>
        </div>

    </div>

    <div class="corpoListar mt-4">

        <div class="pesquisaLista">
            <form action="#" method="post" id="listaSearch" name="listaSearch">
                <div class="row">

                    <div class="col d-flex align-items-center">
                        <label for="tipopesquisa">Pesquisar por: </label>
                        <select name="tipopesquisa" id="tipopesquisa" required>
                            <option value="0" selected>Livro - Título</option>
                            <option value="1">Livro - ISBN</option>
                            <option value="2">Usuário - Nome</option>
                            <option value="3">Usuário - CPF</option>
                        </select>
                    </div>

                    <div class="col">
                        <input type="text" name="textoPesquisa" placeholder="Pesquise aqui..." maxlength="180" required>
                        <button type="submit"><span class="mdi mdi-magnify"></span></button>
                    </div>

                </div>
            </form>
        </div>

    </div>

</div>