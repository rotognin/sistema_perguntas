<?php

header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');

require ('./vendor/autoload.php');

require_once('informacoes.php');
require_once('funcoes.php');
require_once('auxiliares.php');
require_once('emails.php');

define ("DS", DIRECTORY_SEPARATOR);

define ("NIVEL_USUARIO", array(
    '0' => 'Administrador',
    '1' => 'Ativo',
    '2' => 'Inativo',
    '3' => 'Pendente'
));

define ("STATUS_PERGUNTA", array(
    'Ativo' => 1,
    'Inativo' => 2
));

define ("VOTO", array(
    'Positivo' => 1,
    'Negativo' => 2
));