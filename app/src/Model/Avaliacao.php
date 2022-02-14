<?php

namespace Src\Model;

use CoffeeCode\DataLayer\DataLayer;

class Avaliacao extends DataLayer
{
    public function __construct()
    {
        parent::__construct('avaliacoes', ['resposta_id', 'usuario_id', 'voto'], 'id', true);
    }
}