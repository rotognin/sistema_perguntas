<!DOCTYPE html>
<html>
<?php include 'html/head.php'; ?>
<body>
    <div class="container-fluid">
        <h3>Administração do sistema de Perguntas</h3>
        <p>Olá, <?php echo $_SESSION['usuNome']; ?></p>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-white" href="index.php?action=usuarios&control=usuario">Usuários</a>
                    <span class="nav-link text-white">|</span>
                    <a class="nav-link text-white" href="index.php?action=Perguntas&control=pergunta">Perguntas</a>
                    <span class="nav-link text-white">|</span>

                    <!-- Ver se mais pra frente poderemos ter parâmetros no sistema -->
                    <!--a class="nav-link text-white" href="index.php?action=cadastro&control=parametro">Parâmetros</a>
                    <span class="nav-link text-white">|</span-->

                    <a class="nav-link text-white" href="index.php?action=logout">Sair</a>
                </div>
            </div>
        </nav>
        <br>

        <!-- Exibir um dashboard para saber como anda o sistema:
             - Número total de perguntas
             - Total de usuários ativos e inativos
             - Total de usuários logados no momento
             - Etc...
        -->
    </div>
    <?php include 'html/scriptsjs.php'; ?>
</body>
</html>