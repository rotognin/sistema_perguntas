<?php

namespace Src\Model;

use CoffeeCode\DataLayer\DataLayer;

class Pergunta extends DataLayer
{
    public function __construct()
    {
        parent::__construct('perguntas', ['texto'], 'id', true);
    }
}