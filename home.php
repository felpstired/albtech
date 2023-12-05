<?php 

if (empty($_SESSION['dadosUser'])) {

    header("refresh:0; url=./index.php");
    die();
}

?>
<div class="body">

    <?php

    // Arquivo com a navbar do site
    include_once './menutop.php';

    ?>

    <div id="corpo">
        <div class="corp">

            <div id="contentHome">


                <?php

                include_once './pages/emprestimo/listar.php';

                ?>


            </div>

        </div>
    </div>


    <?php

    // Arquivo com o footer do site
    include_once './footer.php';

    ?>

</div>