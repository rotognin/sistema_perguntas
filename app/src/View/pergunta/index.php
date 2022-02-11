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
                    <a class="nav-link text-white" href="index.php?action=principal">Página inicial</a>
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
                            <a class="nav-link text-white" href="index.php?action=registro">Registrar</a>
                            <span class="nav-link text-white">|</span>
                        <?php
                        }
                    ?>
                </div>
            </div>
        </nav>
        <?php
           echo '<br><br>';
           echo '<h3>Perguntas cadastradas:</h3>';
           echo '<br>';

           foreach ($perguntas as $pergunta){
               echo $pergunta->id . ' - ' . $pergunta->texto . '<br>';
               /**
                * Ideia: para cada pergunta, carregar as três respostas mais bem votadas
                * Montar um Accordion, onde serão exibidas as respostas
                * https://getbootstrap.com/docs/4.0/components/collapse/
                */
           }
        ?>
    </div>
    <?php include ('./html/scriptsjs.php'); ?>
</body>
</html>