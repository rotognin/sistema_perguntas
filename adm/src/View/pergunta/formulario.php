<form class="col-12" method="post" action="index.php?control=pergunta&action=gravar">
    <input type="hidden" name="_token" value="<?php echo $_SESSION['csrf']; ?>">
    
    <div class="form-group">
        <label for="id" style="margin:0px"><b>ID: &nbsp;</b></label><br>
        <input type="number" id="id" name="id" readonly value="<?php echo ($pergunta->id ?? '0'); ?>">
    </div>
    <div class="form-group">
        <label for="texto" style="margin:0px"><b>Pergunta: &nbsp;</b></label><br>
        <input type="text" id="texto" name="texto" value="<?php echo ($pergunta->texto ?? ''); ?>" size="100" autofocus>
    </div>

    <input type="hidden" id="status" name="status" value="<?php echo ($pergunta->status ?? '1'); ?>">
    <input type="hidden" id="acao" name="acao" value="<?php echo $acao; ?>">

    <button type="submit" value="Gravar" class="btn btn-primary">Gravar</button>
</form>