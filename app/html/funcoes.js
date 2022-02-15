
    function votoPositivo(resposta_id){
        var iQtdPositivo = $('#votos' + resposta_id + ' button#positivo span').html();
        iQtdPositivo = Number(iQtdPositivo) + 1;

        var iQtdNegativo = $('#votos' + resposta_id + ' button#negativo span').html();

        var sHtml = 'Votado: &nbsp;&nbsp;<button class="btn btn-primary btn-sm" disabled>Positivo&nbsp;&nbsp;&nbsp;';
        sHtml += '<span class="badge badge-light">' + iQtdPositivo + '</span>';
        sHtml += '</button>&nbsp;&nbsp;&nbsp;';
        sHtml += '<button class="btn btn-secondary btn-sm" disabled>Negativo&nbsp;&nbsp;&nbsp;';
        sHtml += '<span class="badge badge-light">' + iQtdNegativo + '</span>';
        sHtml += '</button>';

        $('#votos' + resposta_id).html(sHtml);

        // Fazer o Ajax para o backend para gravar o voto dado
        
    }

    function votoNegativo(resposta_id){
        var iQtdNegativo = $('#votos' + resposta_id + ' button#negativo span').html();
        iQtdNegativo = Number(iQtdNegativo) + 1;

        var iQtdPositivo = $('#votos' + resposta_id + ' button#positivo span').html();

        var sHtml = 'Votado: &nbsp;&nbsp;<button class="btn btn-secondary btn-sm" disabled>Positivo&nbsp;&nbsp;&nbsp;';
        sHtml += '<span class="badge badge-light">' + iQtdPositivo + '</span>';
        sHtml += '</button>&nbsp;&nbsp;&nbsp;';
        sHtml += '<button class="btn btn-primary btn-sm" disabled>Negativo&nbsp;&nbsp;&nbsp;';
        sHtml += '<span class="badge badge-light">' + iQtdNegativo + '</span>';
        sHtml += '</button>';

        $('#votos' + resposta_id).html(sHtml);
    }