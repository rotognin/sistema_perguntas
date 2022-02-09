<!DOCTYPE html>
<html>
<?php 
    include ('./html/head.php'); 
?>
<body>
    <div class="container">
        <br>
        <h1>Sistema de perguntas e respostas!</h1>
        <p>
        <?php 
            echo ($logado) ? 'Está logado' : 'Não está logado';

        ?>
        </p>
        <?php
           if ($logado){
               echo '<a href="index.php?action=acesso">Efetuar o login</a>';
           } else {
               echo '<a href="index.php?action=logout">Sair</a>';
           }
        ?>
    </div>
</body>
</html>