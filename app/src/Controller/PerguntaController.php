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

    /**
     * Verificar quantas 
     */
    public static function pergunta()
    {
        criarCsrf();
        $pergunta = (new Pergunta())->buscarAleatoria();
        parent::view('pergunta.pergunta', ['pergunta' => $pergunta, 'logado' => estaLogado()]);
    }
}