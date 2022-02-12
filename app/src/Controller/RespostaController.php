<?php

namespace Src\Controller;

use Src\Model\Resposta;

class RespostaController extends Controller
{
    public static function gravar(array $post, array $get)
    {
        if (!isset($post['_token']) || $post['_token'] != $_SESSION['csrf']){
            parent::logout($post, $get, 'Acesso incorreto. Realize um novo login.');
            exit;
        }

        $texto = verificarString($post['texto']);

        if ($texto == '' || strlen($texto) < 20){
            $mensagem = 'É necessário informar uma resposta com pelo menos 20 caracteres';
            PerguntaController::pergunta([], [], $post['pergunta_id'], $mensagem);
            exit;
        }

        $resposta = new Resposta();
        $resposta->texto = $texto;
        $resposta->pergunta_id = filter_var($post['pergunta_id'], FILTER_VALIDATE_INT);
        $resposta->usuario_id = filter_var($_SESSION['usuId'], FILTER_VALIDATE_INT);
        $resposta->status = 1;

        if (!$resposta->save()){
            $mensagem = 'Não foi possível gravar a sua resposta.';
            PerguntaController::pergunta([], [], $post['pergunta_id'], $mensagem);
        } else {
            PerguntaController::pergunta([], [], $post['pergunta_id'], '', $texto);
        }
    }
}