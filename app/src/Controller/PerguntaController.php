<?php

namespace Src\Controller;

use Src\Model\Pergunta;
use Src\Model\Resposta;
use Src\Model\Usuario;
use Src\Model\Avaliacao;

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

                // Votos positivos
                $params = http_build_query(['voto' => VOTO['Positivo'], 'resposta_id' => $resposta->id]);
                $resposta->positivos = (new Avaliacao())->find('voto = :voto AND resposta_id = :resposta_id', $params)->count();

                // Votos negativos
                $params = http_build_query(['voto' => VOTO['Negativo'], 'resposta_id' => $resposta->id]);
                $resposta->negativos = (new Avaliacao())->find('voto = :voto AND resposta_id = :resposta_id', $params)->count();

                // Checar se o usuário já votou naquela resposta
                $params = http_build_query(['resposta_id' => $resposta->id, 'usuario_id' => $_SESSION['usuId']]);
                $resposta->voto = (new Avaliacao())->find('resposta_id = :resposta_id AND usuario_id = :usuario_id', $params)->fetch(true);
            }
        }

        parent::view('pergunta.pergunta', [
            'pergunta' => $pergunta, 
            'logado' => estaLogado(), 
            'mensagem' => $mensagem,
            'texto' => $texto,
            'logado' => estaLogado()
        ]);

    }
}