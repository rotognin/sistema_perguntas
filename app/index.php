<?php

session_start();

use Src\Controller;

require ('./lib/definicoes.php');

$action = (isset($_GET['action'])) ? $_GET['action'] : 'home';
$control = (isset($_GET['control'])) ? ucfirst($_GET['control']) : '';
$funcao = 'Src\\Controller\\' . $control . 'Controller::' . $action;

if (!is_callable($funcao)){
    $_POST['erro'] = 'Acesso incorreto.';
    $funcao = 'Src\\Controller\\Controller::home';
}

call_user_func($funcao, $_POST, $_GET);