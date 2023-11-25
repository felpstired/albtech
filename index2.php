<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- titulo da página -->
    <title>Gerenciamento de Biblioteca</title>

    <!-- links para as fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- link para o css do bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- link para o nosso css -->
    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>
        
        <div id="content">

            <div class="divForm text-center text-white p-5">
                <div class="imgForm">
                    <img src="./assets/img/logo.png" alt="logoSite">
                </div>

                <form action="#" method="post" id="frmCadastro" name="frmCadastro">

                    <div class="camposForm mb-3">

                        <h1>CADASTRO</h1>

                        <input type="text" name="nomeCadastro" placeholder="Nome" maxlength="80" required>
                        <input type="email" name="emailCadastro" placeholder="E-mail" maxlength="60" required>
                        <input type="text" name="cpfCadastro" placeholder="CPF" id="maskCpf" maxlength="14" required>
                        <input type="password" name="senhaCadastro" placeholder="Senha" maxlength="30" required>

                    </div>

                    <div class="footerForm">
                        <button type="submit" class="mb-3">Cadastrar</button>

                        <p>Já possui uma conta? <a href="./index.php">Faça Login</a></p>
                    </div>

                </form>
            </div>

        </div>


        
    <!-- links para os javascripts do bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- link para nosso script -->
    <script src="./assets/js/script.js"></script>

</body>

</html>