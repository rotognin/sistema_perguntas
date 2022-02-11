<?php

namespace Src\Controller;

use Src\Model\Pergunta;

class PerguntaController extends Controller
{
    public static function index()
    {
        $perguntas = (new Pergunta())->obterTodas('Ativo');
        parent::view('pergunta.index', ['logado' => estaLogado(), 'perguntas' => $perguntas]);
    }
}