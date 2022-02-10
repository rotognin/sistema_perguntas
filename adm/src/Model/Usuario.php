<?php

namespace Src\Model;

use CoffeeCode\DataLayer\DataLayer;

class Usuario extends DataLayer
{
    public function __construct()
    {
        parent::__construct('usuarios', ['login', 'nome', 'email', 'senha', 'status'], 'id', true);
    }
}