<form class="col-12" method="post" action="index.php?control=usuario&action=confirmacao">
    <input type="hidden" name="_token" value="<?php echo $_SESSION['csrf']; ?>">
    <input type="hidden" id="id" name="id" readonly value="<?php echo ($usuario->id ?? '0'); ?>">

    <div class="form-group">
        <label for="login" style="margin:0px"><b>Login:</b></label><br>
        <input type="text" id="login" name="login" autofocus>
    </div>
    <div class="form-group">
        <label for="codigo" style="margin:0px"><b>Código de confirmação:</b></label><br>
        <input type="text" id="codigo" name="codigo">
    </div>

    <button type="submit" value="Enviar" class="btn btn-primary">Enviar</button>
</form>