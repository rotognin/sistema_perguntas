<!DOCTYPE html>
<html>
<?php include 'html/head.php'; ?>
<body>
    <div class="container-fluid">
        <h3>Listagem de usuários</h3>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-white" href="index.php?action=menu">Início</a>
                    <span class="nav-link text-white">|</span>
                    <a class="nav-link text-white" href="index.php?action=novo&control=usuario">Novo Usuário</a>
                    <span class="nav-link text-white">|</span>
                    <a class="nav-link text-white" href="index.php?action=logout">Sair</a>
                </div>
            </div>
        </nav>
        <br>
        <?php
            foreach($usuarios as $usuario)
            {
                echo 'ID - ' . $usuario->id . ' - ' . $usuario->nome . '<br>';
            }
        ?>
    </div>
    <?php include 'html/scriptsjs.php'; ?>
</body>
</html>