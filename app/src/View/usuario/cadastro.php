<!DOCTYPE html>
<html>
<?php include ('./html/head.php'); ?>
<body>
    <div class="container-fluid">
        <h3>Novo Usuário</h3>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-white" href="index.php?action=principal">Página inicial</a>
                    <span class="nav-link text-white">|</span>
                </div>
            </div>
        </nav>

        <br>
        <?php
            $regra = 'danger';
            include_once ('./lib/mensagem.php');
        ?>

        <?php require('formulario.php'); ?>

    </div>

    <?php include ('./html/scriptsjs.php'); ?>
</body>
</html>