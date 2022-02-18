
    function votoPositivo(resposta_id){
        // Fazer o Ajax para o backend para gravar o voto dado
        jQuery.post('index.php?acao=votar&control=avaliacao', {'voto':'positivo', 'pergunta_id':resposta_id}, function(retorno){
            if (retorno == 'OK'){
                var iQtdPositivo = jQuery('#votos' + resposta_id + ' button#positivo span').html();
                iQtdPositivo = Number(iQtdPositivo) + 1;

                var iQtdNegativo = jQuery('#votos' + resposta_id + ' button#negativo span').html();

                var sHtml = 'Votado: &nbsp;&nbsp;<button class="btn btn-primary btn-sm" disabled>Positivo&nbsp;&nbsp;&nbsp;';
                sHtml += '<span class="badge badge-light">' + iQtdPositivo + '</span>';
                sHtml += '</button>&nbsp;&nbsp;&nbsp;';
                sHtml += '<button class="btn btn-secondary btn-sm" disabled>Negativo&nbsp;&nbsp;&nbsp;';
                sHtml += '<span class="badge badge-light">' + iQtdNegativo + '</span>';
                sHtml += '</button>';

                jQuery('#votos' + resposta_id).html(sHtml);
            }
        });
    }

    function votoNegativo(resposta_id){
        jQuery.post('index.php?acao=votar&control=avaliacao', {'voto':'negativo', 'pergunta_id':resposta_id}, function(retorno){
            if (retorno == 'OK'){
                var iQtdNegativo = jQuery('#votos' + resposta_id + ' button#negativo span').html();
                iQtdNegativo = Number(iQtdNegativo) + 1;

                var iQtdPositivo = jQuery('#votos' + resposta_id + ' button#positivo span').html();

                var sHtml = 'Votado: &nbsp;&nbsp;<button class="btn btn-secondary btn-sm" disabled>Positivo&nbsp;&nbsp;&nbsp;';
                sHtml += '<span class="badge badge-light">' + iQtdPositivo + '</span>';
                sHtml += '</button>&nbsp;&nbsp;&nbsp;';
                sHtml += '<button class="btn btn-primary btn-sm" disabled>Negativo&nbsp;&nbsp;&nbsp;';
                sHtml += '<span class="badge badge-light">' + iQtdNegativo + '</span>';
                sHtml += '</button>';

                jQuery('#votos' + resposta_id).html(sHtml);
            }
        });
    }