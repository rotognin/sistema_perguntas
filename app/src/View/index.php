<!DOCTYPE html>
<html>
<?php 
    include ('./html/head.php'); 
?>
<body>
    <div class="container-fluid">
        <h1>Sistema de perguntas e respostas!</h1>
        <?php
            if ($logado){
                echo '<p>Seja muito bem vindo(a) ' . $_SESSION['usuNome'] . '! Divirta-se...</p>';
            } else {
                echo '<p>Entre ou faça seu registro para responder às perguntas mais aleatórias que existem!</p>';
            }
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-white" href="index.php?action=index&control=pergunta">Lista de Perguntas</a>
                    <span class="nav-link text-white">|</span>
                    <?php
                        if ($logado){
                        ?>
                            <a class="nav-link text-white" href="index.php?action=pergunta&control=pergunta">Responder Pergunta Aleatória</a>
                            <span class="nav-link text-white">|</span>
                            <a class="nav-link text-white" href="index.php?action=logout">Sair</a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link text-white" href="index.php?action=acesso">Login</a>
                            <span class="nav-link text-white">|</span>
                            <a class="nav-link text-white" href="index.php?action=registro&control=usuario">Cadastrar</a>
                            <span class="nav-link text-white">|</span>
                        <?php
                        }
                    ?>
                </div>
            </div>
        </nav>
        <hr>
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <h1 class="display-4">Como funciona???</h1>
                <p class="lead">
                    Após se cadastrar, efetue o login para poder responder a perguntas aleatórias, além de 
                    poder ver outras respostas e interagir com elas, votando positivo ou negativo.
                </p>
                <hr class="my-4">
                <p>Se você ainda não tem um cadastro, clique no botão abaixo para se cadastrar. É simples e rápido!</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="index.php?action=registro" role="button">Cadastrar</a>
                </p>
            </div>
        </div>
    </div>
    <?php include ('./html/scriptsjs.php'); ?>
</body>
</html>