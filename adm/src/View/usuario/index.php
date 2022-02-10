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
                </div>
            </div>
        </nav>
        <br>
        <?php
            $regra = 'danger';
            include_once ('./lib/mensagem.php');
        ?>
        <br>

        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($usuarios as $usuario){
                    echo '<tr>';
                        echo '<td>' . $usuario->id . '</td>';
                        echo '<td>' . $usuario->nome . '</td>';
                        echo '<td>' . $usuario->login . '</td>';
                        echo '<td>' . NIVEL_USUARIO[$usuario->status] . '</td>';
                        echo '<td>Alterar</td>';
                        echo '<td>Inativar</td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
    <?php include 'html/scriptsjs.php'; ?>
</body>
</html>