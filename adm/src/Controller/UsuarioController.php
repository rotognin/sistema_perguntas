<?php

namespace Src\Controller;

use Src\Model\Usuario;

class UsuarioController extends Controller
{
    public static function index(string $mensagem = '')
    {
        $usuarios = (new Usuario())->find()->fetch(true);
        parent::view('usuario.index', ['usuarios' => $usuarios, 'mensagem' => $mensagem]);
    }

    public static function novo()
    {
        criarCsrf();
        parent::view('usuario.novo', ['acao' => 'novo']);
    }

    public static function gravar(array $post, array $get)
    {
        if (!isset($post['_token']) || $post['_token'] != $_SESSION['csrf']){
            parent::logout('Acesso incorreto. Realize um novo login.');
            Exit;
        }

        // Fazer a validação dos dados
        $valores = array(
            $post['nome'],
            $post['login'],
            $post['email'],
            $post['senha']
        );

        if (verificarEmBranco($valores)){
            self::index('Existem campos em branco. Favor preenchê-los');
            Exit;
        }

        // Continuar as validações


        
    }
}