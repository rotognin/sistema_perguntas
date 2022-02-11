<?php

namespace Src\Model;

use CoffeeCode\DataLayer\DataLayer;

class Resposta extends DataLayer
{
    public function __construct()
    {
        parent::__construct('respostas', ['pergunta_id', 'usuario_id', 'texto'], 'id', true);
    }
}