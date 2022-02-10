<?php

namespace Src\Controller;

use Src\Model\Pergunta;

class PerguntaController extends Controller
{
    public static function index()
    {
        $perguntas = (new Pergunta())->find()->fetch(true);
        parent::view('pergunta.index', ['perguntas' => $perguntas]);
    }

    public static function novo(array $post, array $get, string $mensagem = '')
    {
        criarCsrf();
        parent::view('pergunta.novo', ['acao' => 'novo', 'mensagem' => $mensagem]);
    }

    public static function alterar(array $post, array $get, string $mensagem = '')
    {
        criarCsrf();
        $pergunta = (new Pergunta())->findById($post['id']);
        parent::view('pergunta.alterar', ['pergunta' => $pergunta, 'acao' => 'alterar', 'mensagem' => $mensagem]);
    }

    public static function inativar(array $post, array $get)
    {
        self::alterarStatus($post['id'], STATUS_PERGUNTA['Inativo']);
    }

    public static function ativar(array $post, array $get)
    {
        self::alterarStatus($post['id'], STATUS_PERGUNTA['Ativo']);
    }

    public static function alterarStatus(int $id, int $status)
    {
        $pergunta = (new Pergunta())->findById($id);
        $pergunta->status = $status;

        $mensagem = '';

        if (!$pergunta->save()){
            $mensagem = 'Não foi possível alterar a situação da pergunta.';
        }

        self::index([], [], $mensagem);
    }

    public static function gravar(array $post, array $get)
    {
        if (!isset($post['_token']) || $post['_token'] != $_SESSION['csrf']){
            parent::logout($post, $get, 'Acesso incorreto. Realize um novo login.');
            exit;
        }

        if ($post['texto'] == ''){
            self::novo($post, $get, 'A pergunta não pode ficar em branco.');
            exit;
        }

        $pergunta = ($post['acao'] == 'novo') ? new Pergunta() : (new Pergunta())->findById($post['id']);
        $pergunta->texto = verificarString($post['texto']);
        $pergunta->status = $post['status'];

        if (!$pergunta->save()){
            $mensagem = 'Não foi possível gravar a pergunta.';
            self::novo($post, $get, $mensagem);
            exit;
        }

        self::index([], [], 'Pergunta gravada com sucesso.');

    }
}