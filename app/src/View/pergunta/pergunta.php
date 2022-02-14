<!DOCTYPE html>
<html>
<?php 
    include ('./html/head.php'); 
?>
<body>
    <div class="container-fluid">
        <h1>Pergunta aleatória!</h1>
        <?php
            if ($logado){
                echo '<p>' . $_SESSION['usuNome'] . ', seja criativo na sua resposta!</p>';
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
                            <a class="nav-link text-white" href="index.php?action=index&control=pergunta">Lista de Perguntas</a>
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
        <hr>
        <div class="alert alert-success" role="alert">
            <h3 class="alert-heading"><?php echo $pergunta->texto; ?></h3>
            <p><i>Capriche na resposta, pois você não sabe quando poderá respondê-la novamente!</i></p>
            <hr>
            <?php
                if ($texto == ''){
                ?>
                    <form method="post" action="index.php?action=gravar&control=resposta">
                        <input type="hidden" name="_token" value="<?php echo $_SESSION['csrf']; ?>">

                        <div class="form-group">
                            <textarea class="form-control" type="text" id="texto" name="texto" autofocus rows="3"></textarea>
                        </div>

                        <input type="hidden" id="pergunta_id" name="pergunta_id" value="<?php echo $pergunta->id; ?>">
                        <input type="hidden" id="status" name="status" value="1">

                        <button type="submit" value="Gravar" class="btn btn-primary">Gravar</button>
                    </form>
                <?php
                } else {
                ?>
                    <textarea class="form-control" type="text" id="texto" name="texto" readonly rows="3"><?php echo $texto; ?></textarea>
                <?php
                }
            ?>
            
        </div>
        <?php
            $regra = 'danger';
            include_once ('./lib/mensagem.php');
        ?>
        <br>
        <div class="alert alert-secondary" role="alert">
            <h4 class="alert-heading">Respostas:</h4>
            <hr>

            <?php
                if (!$pergunta->respostas){
                    echo 'Sem respostas ainda...<br>';
                } else {
                    foreach($pergunta->respostas as $resposta){
                        echo '<p><b>' . $resposta->usuario->nome . '</b> em ' . date_format(date_create($resposta->created_at),"d/m/Y H:i") . '</p>';
                        echo '<p>' . $resposta->texto . '</p>';
                        echo '<span id="votos" data-resposta-id="' . $resposta->id . '">';

                        if (is_null($resposta->voto)){
                            echo 'Votar: &nbsp;&nbsp;<button id="positivo">Positivo</button>&nbsp;&nbsp;&nbsp;<button id="negativo">Negativo</button>';
                        } else {
                            if ($resposta->voto->voto == VOTO['Positivo']){
                                echo 'Votado: &nbsp;&nbsp;<span class="btn btn-primary">Positivo</span>&nbsp;&nbsp;&nbsp;<span>Negativo</span>';
                            } else {
                                echo 'Votado: &nbsp;&nbsp;<span>Positivo</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-secondary">Negativo</span>';
                            }
                        }
                        echo '</span>';
                        
                        echo '<hr>';
                    }
                }
            ?>
        </div>
    </div>
    <?php include ('./html/scriptsjs.php'); ?>
    <?php include ('./html/funcoes.js'); ?>
</body>
</html>