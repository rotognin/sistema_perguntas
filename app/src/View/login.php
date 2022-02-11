<!DOCTYPE html>
<html>
<?php 
    include ('./html/head.php'); 
?>
<body>
    <div class="container">
        <br>
        <div class="card text-center">
            <br>
            <h2>Login no Sistema de Perguntas e Respostas</h2>
            <br>
            <form method="post" action="index.php?action=login">
                <input type="hidden" name="_token" value="<?php echo $_SESSION['csrf']; ?>">
                <div class="form-group">
                    <label for="login" style="margin:0px"><b>Login: </b></label><br>
                    <input type="text" id="login" name="login" size="40" autofocus>
                </div>
                <div class="form-group">
                    <label for="senha" style="margin:0px"><b>Senha: </b></label><br>
                    <input type="password" id="senha" name="senha" size="40">
                </div>
                <input type="submit" value="Entrar" class="btn btn-primary">
            </form>
            <br>
            <?php
                $regra = 'danger';
                include_once ('./lib/mensagem.php');
            ?>
            <br>
        </div>
    </div>
    <?php include ('./html/scriptsjs.php'); ?>
</body>
</html>