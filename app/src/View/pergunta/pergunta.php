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
            <hr>
            <form method="post" action="index.php?action=gravar&control=resposta">
                <input type="hidden" name="_token" value="<?php echo $_SESSION['csrf']; ?>">

                <div class="form-group">
                    <textarea class="form-control" type="text" id="texto" name="texto" autofocus rows="3"></textarea>
                </div>

                <input type="hidden" id="pergunta_id" name="pergunta_id" value="<?php echo $pergunta->id; ?>">
                <input type="hidden" id="usuario_id" name="usuario_id" value="<?php echo $_SESSION['usuId']; ?>">
                <input type="hidden" id="status" name="status" value="1">

                <button type="submit" value="Gravar" class="btn btn-primary">Gravar</button>
            </form>
        </div>
        <br>
        <div class="alert alert-secondary" role="alert">
            <h4 class="alert-heading">Respostas:</h4>
            <!-- Dados fictícios para teste -->
            <hr>

            <?php
                if (!$pergunta->respostas){
                    echo 'Sem respostas...<br>';
                } else {
                    echo 'Existem respostas!<br>';
                }
            ?>

            <!--p><b>Rodrigo Tognin</b> em 01/01/2022:</p>
            <p>Eu acho que é isso mesmo, que estávamos falando.</p>
            <hr>
            <p><b>Jonas da Silva</b> em 03/01/2022:</p>
            <p>É verdade mesmo, estive pensando nisso....</p>
            <hr>
            <p><b>Janaína Catarina</b> em 05/01/2022:</p>
            <p>Talvez não seja realmente verdade o que responderam anteriormente, pois veja só, ...</p-->
        </div>
    </div>
    <?php include ('./html/scriptsjs.php'); ?>
</body>
</html>