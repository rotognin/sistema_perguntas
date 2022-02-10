<!DOCTYPE html>
<html>
<?php include 'html/head.php'; ?>
<body>
    <div class="container-fluid">
        <h3>Listagem de perguntas</h3>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-white" href="index.php?action=menu">Início</a>
                    <span class="nav-link text-white">|</span>
                    <a class="nav-link text-white" href="index.php?action=novo&control=pergunta">Nova Pergunta</a>
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
                    <th>Pergunta</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($perguntas as $pergunta){
                    echo '<tr>';
                        echo '<td>' . $pergunta->id . '</td>';
                        echo '<td>' . $pergunta->texto . '</td>';
                        echo '<td>' . STATUS_PERGUNTA[$pergunta->status] . '</td>';
                        echo '<td>'; 
                            echo '<form method="post" action="index.php?control=pergunta&action=alterar">';
                                echo '<input type="hidden" name="id" value="' . $pergunta->id . '">';
                                echo '<input type="submit" style="margin-left: 10px" value="Alterar" class="btn btn-primary btn-sm">';
                            echo '</form>';
                        echo '</td>';
                        
                        $acao = (STATUS_PERGUNTA[$pergunta->status] == 'Ativa') ? 'inativar' : 'ativar';

                        echo '<td>';
                                echo '<form method="post" action="index.php?control=pergunta&action=' . $acao . '">';
                                echo '<input type="hidden" name="id" value="' . $pergunta->id . '">';
                                echo '<input type="submit" style="margin-left: 10px" value="' . ucfirst($acao) . '" class="btn btn-info btn-sm">';
                            echo '</form>';
                        echo '</td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
    <?php include 'html/scriptsjs.php'; ?>
</body>
</html>