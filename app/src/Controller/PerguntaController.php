<?php

namespace Src\Controller;

use Src\Model\Pergunta;
use Src\Model\Resposta;
use Src\Model\Usuario;

class PerguntaController extends Controller
{
    public static function index()
    {
        $perguntas = (new Pergunta())->obterTodas('Ativo');
        parent::view('pergunta.index', ['logado' => estaLogado(), 'perguntas' => $perguntas]);
    }

    /**
     * Chamar a tela de pergunta com um ID carregado ou escolher uma aleatoriamente
     */
    public static function pergunta(array $post, array $get, int $id = 0, string $mensagem = '', string $texto = '')
    {
        criarCsrf();
        $pergunta = ($id == 0) ? (new Pergunta())->buscarAleatoria() : (new Pergunta())->findById($id);
        $pergunta->respostas = (new Resposta())->find('pergunta_id = ' . $pergunta->id)->fetch(true);

        if (!empty($pergunta->respostas)){
            foreach($pergunta->respostas as $resposta){
                $resposta->usuario = (new Usuario())->findById($resposta->usuario_id);
            }
        }

        parent::view('pergunta.pergunta', [
            'pergunta' => $pergunta, 
            'logado' => estaLogado(), 
            'mensagem' => $mensagem,
            'texto' => $texto
        ]);

    }
}