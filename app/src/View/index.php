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
        <a href="index.php?action=acesso">Efetuar o login</a>
    </div>
</body>
</html>