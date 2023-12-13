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
                    <h1>Alteração de Dados Cadastrais</h1>
                </div>
            </div>
        </div>

    </div>

    <div class="corpoListar mt-4">

        <div class="formAltSession p-4 fs-5 fw-bold">

            <form action="#" method="post" id="frmAltSession" name="frmAltSession">

                <div class="row">
                    <div class="mb-3 col-sm-12 col-md-4">
                        <label for="nomeAltSession" class="form-label"><span class="mdi mdi-account"></span> Alterar Nome:</label>
                        <input type="text" class="form-control" id="nomeAltSession" value="<?php echo $_SESSION['dadosUser']['nome'] ?>" name="nomeAltSession" placeholder="Insira seu nome..." maxlength="120" required>
                    </div>
                    <div class="mb-3 col-sm-12 col-md-4 text-center">
                        <label for="cpfAltSession" class="form-label"><span class="mdi mdi-card-account-details-star"></span> CPF Cadastrado:</label> <br>
                        <span class="fw-normal">
                            <?php

                            $cpf = substr_replace($_SESSION['dadosUser']['cpf'], '***.***', 4, -3);

                            echo $cpf;
                            
                            ?>
                        </span>
                    </div>
                    <div class="mb-3 col-sm-12 col-md-4">
                        <label for="telAltSession" class="form-label"><span class="mdi mdi-phone"></span> Alterar Telefone:</label>
                        <input type="text" class="form-control maskTelefone" id="telAltSession" value="<?php echo $_SESSION['dadosUser']['telefone'] ?>" name="telAltSession" placeholder="(33) 9 9999-9999" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="emailAltSession" class="form-label"><span class="mdi mdi-at"></span> Alterar E-mail:</label>
                    <input type="email" class="form-control" id="emailAltSession" value="<?php echo $_SESSION['dadosUser']['email'] ?>" name="emailAltSession" placeholder="Insira seu email..." required>
                </div>

                <div class="row">
                    <div class="mb-3 col-sm-12 col-md-6">
                        <label for="senhaAltSession" class="form-label"><span class="mdi mdi-lock"></span> Alterar Senha:</label>
                        <input type="password" class="form-control" id="senhaAltSession" name="senhaAltSession" placeholder="Digite uma nova senha..." maxlength="120">
                    </div>
                    <div class="mb-3 col-sm-12 col-md-6">
                        <label for="senhaAltSession2" class="form-label"><span class="mdi mdi-lock-alert"></span> Repita sua nova senha:</label>
                        <input type="password" class="form-control" id="senhaAltSession2" name="senhaAltSession2" placeholder="Confirme sua nova senha...">
                    </div>
                </div>
                <div id="errorMsg" class="form-text text-danger"></div>

                <button type="submit" class="btn btn-success mt-3" onclick="altSession();">Cadastrar Usuário</button>

            </form>

        </div>

    </div>

</div>