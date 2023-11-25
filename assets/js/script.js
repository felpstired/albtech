$(document).ready(function () {

    // fazer as mascars funcionarem
    masks();


    // navegação na página
    $('.linkMenu').click(function (event) {
        event.preventDefault();

        document.getElementById("homeSidebar").style.width = "0"

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
                    setTimeout(function () {
                        loadingEnd();
                        $('div#content').html(retorno);
                    }, 1000);
                } else {
                    msgGeral('ERRO: ' + retorno + ' Tente novamente mais tarde.', 'error');
                }

            }
        });
    });

    // abrir e fechar a sidebar
    $('#btnMenu').click(function () {
        document.getElementById("homeSidebar").style.width = "25%";
    });

    $('#closeSidebar').click(function () {
        document.getElementById("homeSidebar").style.width = "0";
    })

});

function masks() {
    $('.maskCPF').inputmask({
        mask: '999.999.999-99'
    });

    $('.maskDate').inputmask({
        mask: '99/9999'
    });

}

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




// FUNÇÕES DE CADASTRAR, ALTERAR E EXCLUIR

var sendAddUser = false;

function addUser() {

    console.log('botao');

    if (!sendAddUser) {

        $('#frmAddUser').submit(function (event) {
            event.preventDefault();

            let form = this;

            let dadosForm = $(this).serializeArray();

            dadosForm.push(
                {name: 'acao', value: 'addUser'},
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