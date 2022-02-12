<form class="col-12" method="post" action="index.php?control=usuario&action=gravar">
    <input type="hidden" name="_token" value="<?php echo $_SESSION['csrf']; ?>">
    <input type="hidden" id="id" name="id" readonly value="<?php echo ($usuario->id ?? '0'); ?>">

    <div class="form-group">
        <label for="nome" style="margin:0px"><b>Nome: &nbsp;</b></label><br>
        <input type="text" id="nome" name="nome" value="<?php echo ($usuario->nome ?? ''); ?>" size="60" autofocus>
    </div>
    <div class="form-group">
        <label for="login" style="margin:0px"><b>Login: &nbsp;</b></label><br>
        <input type="text" id="login" name="login" value="<?php echo ($usuario->login ?? ''); ?>" size="60">
    </div>
    <div class="form-group">
        <label for="email" style="margin:0px"><b>E-mail: &nbsp;</b></label><br>
        <input type="text" id="email" name="email" value="<?php echo ($usuario->email ?? ''); ?>" size="60">
    </div>
    <div class="form-group">
        <label for="senha" style="margin:0px"><b>Senha: &nbsp;</b></label><br>
        <input type="password" id="senha" name="senha">
    </div>
    <div class="form-group">
        <label for="senha_novamente" style="margin:0px"><b>Redigite a Senha: &nbsp;</b></label><br>
        <input type="password" id="senha_novamente" name="senha_novamente">
    </div>

    <input type="hidden" id="acao" name="acao" value="<?php echo $acao; ?>">

    <button type="submit" value="Gravar" class="btn btn-primary">Gravar</button>
</form>