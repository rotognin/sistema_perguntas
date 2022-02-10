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
                        echo '<td>'; 
                            echo '<form method="post" action="index.php?control=usuario&action=alterar">';
                                echo '<input type="hidden" name="id" value="' . $usuario->id . '">';
                                echo '<input type="submit" style="margin-left: 10px" value="Alterar" class="btn btn-primary btn-sm">';
                            echo '</form>';
                        echo '</td>';
                        
                        if (NIVEL_USUARIO[$usuario->status] != 'Administrador'){
                            $acao = (NIVEL_USUARIO[$usuario->status] == 'Ativo') ? 'inativar' : 'ativar';

                            echo '<td>';
                                    echo '<form method="post" action="index.php?control=usuario&action=' . $acao . '">';
                                    echo '<input type="hidden" name="id" value="' . $usuario->id . '">';
                                    echo '<input type="submit" style="margin-left: 10px" value="' . ucfirst($acao) . '" class="btn btn-info btn-sm">';
                                echo '</form>';
                            echo '</td>';
                        } else {
                            echo '<td>.</td>';
                        }

                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
    <?php include 'html/scriptsjs.php'; ?>
</body>
</html>