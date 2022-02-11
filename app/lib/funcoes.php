<?php

/**
 * Insere aspas na string passada
 */
function aspas(string $valor)
{
    return '"' . $valor . '"';
}

/**
 * Recebe o campo Data do banco e o formata para DD/MM/AAAA
 */
function ajustarData(string $dataOrigem)
{
    if ($dataOrigem == ''){
        return '';
    }
    
    $data = explode('-', $dataOrigem);
    $dataAjustada = $data[2] . '/' . $data[1] . '/' . $data[0];
    return ($dataAjustada == '00/00/0000') ? '' : $dataAjustada;
}

/**
 * Recebe o campo Data do banco e o formata para HH:MM
 */
function ajustarHora(string $dataHoraOrigem)
{
    $dataHora = explode(' ', $dataHoraOrigem);
    $hora     = explode(':', $dataHora[1]);
    return $hora[0] . ':' . $hora[1];
}

/**
 * Proteção contra textos maliciosos
 */
function verificarString(string $texto) {
    $texto = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/i", "", $texto);
    $texto = trim($texto);
    $texto = strip_tags($texto);
    $texto = addslashes($texto);
    return $texto;
}

/**
 * Criação do token CSRF guardando na seção
 */
function criarCsrf()
{
    $_SESSION['csrf'] = sha1(date('d-m-Y H-i-s'));
}

/**
 * Verificar se o usuário está logado.
 */

function estaLogado()
{
    if (!isset($_SESSION['usuId']) || $_SESSION['usuId'] == 0){
        return false;
    }

    return true;
}
