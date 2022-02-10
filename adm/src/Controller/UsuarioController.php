<?php

namespace Src\Controller;

use Src\Model\Usuario;

class UsuarioController extends Controller
{
    public static function index(array $post, array $get, string $mensagem = '')
    {
        $usuarios = (new Usuario())->find()->fetch(true);
        parent::view('usuario.index', ['usuarios' => $usuarios, 'mensagem' => $mensagem]);
    }

    public static function novo(array $post, array $get, string $mensagem = '')
    {
        criarCsrf();
        parent::view('usuario.novo', ['acao' => 'novo', 'mensagem' => $mensagem]);
    }

    public static function gravar(array $post, array $get)
    {
        if (!isset($post['_token']) || $post['_token'] != $_SESSION['csrf']){
            parent::logout($post, $get, 'Acesso incorreto. Realize um novo login.');
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
            self::novo($post, $get, 'Existem campos em branco. Favor preenchê-los');
            Exit;
        }

        // Continuar as validações



    }
}