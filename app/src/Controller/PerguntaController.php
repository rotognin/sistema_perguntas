<?php

namespace Src\Controller;

use Src\Model\Pergunta;
use Src\Model\Resposta;

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

        // Buscar as respostas da pergunta selecionada
        $pergunta->respostas = (new Resposta())->find('pergunta_id = ' . $pergunta->id)->fetch(true);

        parent::view('pergunta.pergunta', ['pergunta' => $pergunta, 'logado' => estaLogado()]);
    }
}