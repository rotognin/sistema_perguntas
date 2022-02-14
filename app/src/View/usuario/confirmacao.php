<!DOCTYPE html>
<html>
<?php include ('./html/head.php'); ?>
<body>
    <div class="container-fluid">
        <br>
        <h3>Confirme o seu cadastro!</h3>
        <br>
        <p>Foi enviado um código por e-mail para você confirmar o acesso ao sistema.<p>
        <?php
            $regra = 'danger';
            include_once ('./lib/mensagem.php');
        ?>

        <?php require('formconfirmacao.php'); ?>

    </div>

    <?php include ('./html/scriptsjs.php'); ?>
</body>
</html>