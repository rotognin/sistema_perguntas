<?php

namespace Src\Model;

use CoffeeCode\DataLayer\DataLayer;

class Usuario extends DataLayer
{
    public function __construct()
    {
        parent::__construct('usuarios', ['login', 'nome', 'email', 'senha', 'status'], 'id', true);
    }

    public function gerarCodigoConfirmacao()
    {
        $this->codigo = rand(0, 9) . rand(0, 9) . rand(0, 9) .
                        rand(0, 9) . rand(0, 9) . rand(0, 9);
    }

    public function loginExiste()
    {
        $usuario = (new Usuario())->find('login = :login', 'login=' . $this->login)->fetch(true);
        return $usuario;
    }
}