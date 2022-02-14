<?php

/**
 * Mensagens a serem utilizadas para enviar e-mails automaticamente
 */
function novoUsuario(string $nome, string $codigo)
{
    $mensagem = <<<EMAIL
    <p>Olá $nome, você se cadastrou no sistema de Perguntas e Respostas.</p>
    <p>Para dar continuidade no seu cadastro e poder responder as perguntas,
    acesse o sistema com seu login e senha criados, e na página de confirmação informe
    o código abaixo.</p>
    <br>
    <p><b>$codigo</b></p>
    <br>
    <p><i>Se esse e-mail chegou a você por engano, por favor, desconsidere, e já pedimos <br>
    desculpas pelo inconveniente.</i></p>
    <br>
    <p><i>Sistema de perguntas e respostas</i></p>
    <br>
    https://rodrigotognin.com.br/perguntas
EMAIL;

    return $mensagem;

}