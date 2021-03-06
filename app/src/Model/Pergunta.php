<?php

namespace Src\Model;

use CoffeeCode\DataLayer\DataLayer;

class Pergunta extends DataLayer
{
    public function __construct()
    {
        parent::__construct('perguntas', ['texto'], 'id', true);
    }

    public function obterTodas(string $status = '')
    {
        $params = '';
        $busca = '';

        if ($status != ''){
            $params = http_build_query(['status' => obterStatus($status)]);
            $busca = 'status = :status';
        }

        return (new Pergunta())->find($busca, $params)->fetch(true);
    }

    public function buscarAleatoria()
    {
        $quantidade = (new Pergunta())->find()->count();

        $encontrou = false;

        while (!$encontrou)
        {
            $codigo = rand(1, $quantidade);
            $pergunta = (new Pergunta())->findById($codigo);
            $encontrou = (obterStatus($pergunta->status) == 'Ativo');
        }

        return $pergunta;
    }
}