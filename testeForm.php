<form action="#" method="post" name="formExterno" id="formExterno">

    <input type="text" name="teste2"> <br>

    <form action="#" method="post" name="formInterno" id="formInterno">

        <input type="text" name="teste1"> <br>

        <button type="submit" onclick="formtest1();">Enviar form interno</button> <br>

    </form>

    <button type="submit" onclick="formtest2();">Enviar form externo</button>

</form>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>

    function formtest1() {

        $('#formInterno').submit(function(event) {
            event.preventDefault();

            var dados = $(this).serializeArray();

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'validarForm.php',
                data: dados,
                beforeSend: function() {
                    console.log('Antes de enviar');
                },
                success: function(retorno) {

                    alert(retorno);

                }

            });

        })

    }
    function formtest2() {

        $('#formExterno').submit(function(event) {
            event.preventDefault();

            var dados = $(this).serializeArray();

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'validarForm.php',
                data: dados,
                beforeSend: function() {
                    console.log('Antes de enviar');
                },
                success: function(retorno) {

                    alert(retorno);

                }

            });

        })

    }

</script>