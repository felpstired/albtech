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
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddUser">
                        <h4>Registrar novo Usuário</h4>
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

<div class="modal fade" tabindex="-1" id="modalAddUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h3 class="modal-title"><span class="mdi mdi-account-plus"></span> Novo Registro de Usuário</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="#" method="post" id="frmAddUser" name="frmAddUser">

                <div class="modal-body fs-5">

                    <div class="mb-3">
                        <label for="nomeAddUser" class="form-label"><span class="mdi mdi-account"></span> Nome:</label>
                        <input type="text" class="form-control" id="nomeAddUser" name="nomeAddUser" placeholder="Insira seu nome..." maxlength="120" required>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label for="cpfAddUser" class="form-label"><span class="mdi mdi-card-account-details-star"></span> CPF:</label>
                            <input type="text" class="form-control maskCPF" id="cpfAddUser" name="cpfAddUser" placeholder="123.456.789-10" maxlength="120" required>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label for="telAddUser" class="form-label"><span class="mdi mdi-phone"></span> Telefone:</label>
                            <input type="text" class="form-control maskTelefone" id="telAddUser" name="telAddUser" placeholder="(33) 9 9999-9999" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="emailAddUser" class="form-label"><span class="mdi mdi-at"></span> E-mail:</label>
                        <input type="email" class="form-control" id="emailAddUser" name="emailAddUser" placeholder="Insira seu email..." required>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label for="senhaAddUser" class="form-label"><span class="mdi mdi-lock"></span> Senha:</label>
                            <input type="password" class="form-control" id="senhaAddUser" name="senhaAddUser" placeholder="Digite uma senha..." maxlength="120" required>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label for="senhaAddUser2" class="form-label"><span class="mdi mdi-lock-alert"></span> Repita sua senha:</label>
                            <input type="password" class="form-control" id="senhaAddUser2" name="senhaAddUser2" placeholder="Confirme sua senha..." required>
                        </div>
                    </div>
                    <div id="errorMsg" class="form-text text-danger"></div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" onclick="addUser();">Cadastrar Usuário</button>
                </div>

            </form>

        </div>
    </div>
</div>
