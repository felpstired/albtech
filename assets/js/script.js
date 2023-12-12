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
                            window.location.reload();
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

    $('.maskTelefone').inputmask({
        mask: '(99) 9 9999-9999'
    });

    $('.maskDate').inputmask({
        mask: '99/9999'
    });

    $('.maskNumber').inputmask({
        mask: '9999'
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

// função para atualizar as tabelas
function listarPageTab(listar) {

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
            $('div#contentTable').html(retorno);
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

var sendLogin = false;
function Login() {

    if (!sendLogin) {

        $('#frmLogin').submit(function (event) {
            event.preventDefault();

            // console.log('Clicou em entrar');

            let dadosForm = $(this).serializeArray();

            // console.log(dadosForm);

            dadosForm.push(
                { name: 'acao', value: 'Login' },
            )

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'controle.php',
                data: dadosForm,
                beforeSend: function () {
                    // console.log('Antes de enviar');
                },
                success: function (retorno) {
                    // console.log('Depois de enviar');

                    // console.log(retorno);

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

        sendLogin = true;

        return;

    } else {

        return;

    }

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



var divError = document.getElementById('errorMsg');

function procurarLivro() {

    var inputISBN = document.getElementById('livroISBN');

    var isbn = $('#livroISBN').val();

    if (isbn === '') {
        $(divError).html('Você precisa informar o ISBN do livro!');
        inputISBN.classList.toggle('erroInput');
        return;
    }

    if (inputISBN.classList.contains('erroInput')) {
        $(divError).html('');
        inputISBN.classList.toggle('erroInput');
    }

    var dados = {
        acao: 'consultaISBN',
        isbn: isbn,
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'controle.php',
        data: dados,
        beforeSend: function () {
            console.log('Antes de enviar');
        },
        success: function (retorno) {

            console.log(retorno);

            var status = retorno.status;
            var dadosArray = retorno.dadosArray;

            if (status == 'OK') {

                $('input#livroTitulo').val(dadosArray['titulo']);
                $('input#livroAutor').val(dadosArray['autor']);
                $('textarea#livroDesc').val(dadosArray['desc']);
                $('input#livroPubli').val(dadosArray['dataPubli']);
                $('input#livroLink').val(dadosArray['linkCapa']);
                $('input#livroPags').val(dadosArray['numPags']);

            } else {
                msgGeral('ERRO: ' + dadosArray + ' Tente novamente mais tarde.', 'error');
            }

        }

    });

}


// FUNÇÕES DE CADASTRAR, VER MAIS, ALTERAR E EXCLUIR


// AÇÕES USUARIO
var sendAddUser = false;

function addUser() {

    if (!sendAddUser) {

        $('#frmAddUser').submit(function (event) {
            event.preventDefault();

            var inputSenha = document.getElementById('senhaAddUser');
            var inputSenha2 = document.getElementById('senhaAddUser2');
            var senha = $("#senhaAddUser").val();
            var senha2 = $("#senhaAddUser2").val();

            if (senha2 != senha) {
                $(divError).html('As senhas não coincidem! Favor verificar antes de prosseguir.');
                inputSenha.classList.toggle('erroInput');
                inputSenha2.classList.toggle('erroInput');
                return;
            }

            if (senha2.length < 8) {
                $(divError).html('A senha precisa conter no mínimo 8 caracteres! Favor verificar antes de prosseguir.');
                inputSenha.classList.toggle('erroInput');
                inputSenha2.classList.toggle('erroInput');
                return;
            }

            if (inputSenha.classList.contains('erroInput')) {
                $(divError).html('');
                inputSenha.classList.toggle('erroInput');
                inputSenha2.classList.toggle('erroInput');
            }

            let form = this;

            let dadosForm = $(this).serializeArray();

            dadosForm.push(
                { name: 'acao', value: 'addUser' },
            )

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
                        $('.modal-backdrop').remove();
                        msgGeral('Cadastro efetuado com sucesso!', 'success');
                        listarPageTab('listarUser');
                        form.reset();
                    } else {
                        msgGeral('ERRO: ' + retorno + ' Tente novamente mais tarde.', 'error');
                        form.reset();
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

function verUser(id, modal) {

    var dados = {
        acao: 'verUser',
        id: id,
    };

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: 'controle.php',
        data: dados,
        beforeSend: function () {
        }, success: function (retorno) {

            var status = retorno.status;
            var dadosArray = retorno.dadosArray;

            if (status === 'OK') {
                $('span#idUserMais').html(dadosArray['id']);
                $('span#nomeUserMais').html(dadosArray['nome']);
                $('span#emailUserMais').html(dadosArray['email']);
                $('span#cpfUserMais').html(dadosArray['cpf']);
                $('span#telUserMais').html(dadosArray['tel']);
                $('span#pontUserMais').html(dadosArray['pont']);
                $('span#cadUserMais').html(dadosArray['cad']);
                $('span#altUserMais').html(dadosArray['alt']);
                $('span#statusUserMais').html(dadosArray['status']);

                $('#' + modal).modal('show');
            } else {

                $('div#infoUserMais').html('' +
                    '<div class="w-100 alert-danger" role="alert">' + dadosArray + '</div>'
                );

                $('#' + modal).modal('show');

            }

        }
    });

}




// FUNÇÃO DE DELETAR GERAL

// var sendDelete = false;

function msgDelete(id, acao, page) {

    // if (!sendDelete) {

        Swal.fire({
            title: 'Você tem certeza?',
            html: "<?php echo 'aa'; ?> Essa ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Não, cancelar!',
            confirmButtonText: 'Sim, apagar registro!'
        }).then((result) => {
            if (result.isConfirmed) {

                var dados = {
                    acao: acao,
                    id: id,
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
                                title: 'Apagado!',
                                html: 'O registro foi deletado com sucesso.',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            listarPageTab(page);
                        } else {
                            Swal.fire({
                                title: 'Erro!',
                                text: retorno,
                                icon: 'error',
                                showConfirmButton: true,
                            })
                            listarPageTab(page);
                        }

                    }
                });
            }
        })

    //     sendDelete = true;

    //     return;

    // } else {

    //     return;

    // }

}