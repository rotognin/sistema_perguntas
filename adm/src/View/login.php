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
            <h2>Acesso Administrativo ao Sistema</h2>
            <br>
            <form method="post" action="index.php?action=login">
                <div class="form-group">
                    <label for="login"><b>Login:</b> &nbsp;</label>
                    <input type="text" id="login" name="login" size="40px" autofocus>
                </div>
                <div class="form-group">
                    <label for="senha"><b>Senha:</b> &nbsp;</label>
                    <input type="password" id="senha" name="senha" size="40px">
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