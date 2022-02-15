
    function votoPositivo(resposta_id){
        $('#votos' + resposta_id).html('Votado: &nbsp;&nbsp;<span class="btn btn-primary">Positivo</span>&nbsp;&nbsp;&nbsp;<span>Negativo</span>');
    }

    function votoNegativo(resposta_id){
        $('#votos' + resposta_id).html('Votado: &nbsp;&nbsp;<span>Positivo</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-secondary">Negativo</span>');
    }