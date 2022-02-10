<?php

namespace Src\Controller;

use Src\Model\Pergunta;

class PerguntaController extends Controller
{
    public static function index()
    {
        $perguntas = (new Pergunta())->find()->fetch(true);
        parent::view('perguntas.index', ['perguntas' => $perguntas]);
    }
}