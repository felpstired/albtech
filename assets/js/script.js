$(document).ready(function () {

    // fazer as mascars funcionarem
    masks();


    var menuLateral = document.getElementById('offcanvasDarkNavbar');

    // navegação na página
    $('.linkMenu').click(function (event) {
        event.preventDefault();

        let menuClicado = $(this).attr('idMenu');

        let dados = {
            acao: menuClicado,
        };

        $.ajax({
            type: "POST",
            dataType: 'html',
            url: 'controle.php',
            data: dados,
            beforeSend: function () {
                loading();
            }, success: function (retorno) {
                if (retorno != 'Você não está logado!') {
                    if (menuLateral.classList.contains('show')) {
                        menuLateral.classList.toggle('show');
                    }
                    if (menuClicado == 'home') {                        
                        setTimeout(function () {
                            loadingEnd();
                            $('div#content').html(retorno);
                        }, 1000);
                    } else {
                        setTimeout(function () {
                            loadingEnd();
                            $('div#contentHome').html(retorno);
                            window.location.reload();

                        }, 1000);
                    }                    
                } else {
                    msgGeral('ERRO: ' + retorno + ' Tente novamente mais tarde.', 'error');
                }

            }
        });
    });

});

// função de mascaras
function masks() {
    $('.maskCPF').inputmask({
        mask: '999.999.999-99'
    });

    $('.maskDate').inputmask({
        mask: '99/9999'
    });

}

// função de atualizar páginas
function listarPage(listar) {

    let dados = {
        acao: listar,
    };

    $.ajax({
        type: "POST",
        dataType: 'html',
        url: 'controle.php',
        data: dados,
        beforeSend: function () {

        }, success: function (retorno) {
            $('div#content').html(retorno);
        }
    });
}

// função de modal para mostrar uma mensagem 
function msgGeral(msg, tipo) {
    Swal.fire({
        position: 'center',
        icon: tipo,
        title: msg,
        showConfirmButton: false,
        timer: 1500
    })
}

// funções para adicionar um loading na tela 
function loading() {
    Swal.fire({
        title: 'Carregando...',
        html: 'Aguarde um momento.',
        didOpen: () => {
            Swal.showLoading()
        }
    })

}

function loadingEnd() {
    Swal.close();
}




// FUNÇÕES ADM
function Login() {

    $('#frmLogin').submit(function (event) {
        event.preventDefault();

        console.log('Clicou em entrar');

        let dadosForm = $(this).serializeArray();

        console.log(dadosForm);

        dadosForm.push(
            { name: 'acao', value: 'Login' },
        )

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'controle.php',
            data: dadosForm,
            beforeSend: function () {
                console.log('Antes de enviar');
            },
            success: function (retorno) {
                console.log('Depois de enviar');

                console.log(retorno);

                if (retorno === 'OK') {

                    msgGeral('Login efetuado com sucesso!', 'success');

                    setTimeout(function () {
                        listarPage('home');
                        window.location.reload();
                    }, 1500);

                } else {

                    msgGeral('ERRO: ' + retorno + ' Tente novamente mais tarde.', 'error');

                }

            }

        });

    });

}


function Logout() {

    Swal.fire({
        title: "Você tem certeza?",
        text: "Essa ação irá te deslogar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#2d234266',
        cancelButtonText: 'Não, cancelar!',
        confirmButtonText: 'Sim, sair!'
    }).then((result) => {
        if (result.isConfirmed) {

            var dados = {
                acao: 'Logout'
            };

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: 'controle.php',
                data: dados,
                beforeSend: function () {

                }, success: function (retorno) {

                    if (retorno === 'OK') {
                        Swal.fire({
                            title: 'Desconectado!',
                            text: 'Você foi desconectado de nosso site.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500

                        })
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    } else {
                        Swal.fire({
                            title: 'Erro!',
                            text: retorno,
                            icon: 'error',
                            showConfirmButton: true,
                            timer: 1500
                        })
                    }

                }
            });
        }
    })

}




// FUNÇÕES DE CADASTRAR, ALTERAR E EXCLUIR


// AÇÕES USUARIO
var sendAddUser = false;

function addUser() {

    console.log('botao');

    if (!sendAddUser) {

        $('#frmAddUser').submit(function (event) {
            event.preventDefault();

            let form = this;

            let dadosForm = $(this).serializeArray();

            dadosForm.push(
                { name: 'acao', value: 'addUser' },
            )

            // var dados = {
            //     acao: 'addCliente',
            // }

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'controle.php',
                data: dadosForm,
                beforeSend: function () {

                },
                success: function (retorno) {

                    if (retorno === 'OK') {
                        $('#modalAddUser').modal('hide');
                        msgGeral('Cadastro efetuado com sucesso!', 'success');
                        form.reset();
                    } else {
                        msgGeral('ERRO: ' + retorno + ' Tente novamente mais tarde.', 'error');
                    }

                }

            });

        });

        sendAddUser = true;

        return;

    } else {

        return;

    }

}