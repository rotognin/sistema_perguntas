<?php

namespace Src\Controller;

use Src\Model\Usuario;

class UsuarioController extends Controller
{
    public static function registro()
    {
        criarCsrf();
        parent::view('usuario.cadastro');
    }

    public static function gravar(array $post, array $get)
    {
        if (!isset($post['_token']) || $post['_token'] != $_SESSION['csrf']){
            parent::logout($post, $get, 'Acesso incorreto. Realize um novo login.');
            exit;
        }

        // Fazer as validações

        // Ver se as duas senhas são iguais


        // Colocar como status = 3 (pendente de ativação)


        // Gravar o registro


        // Enviar um código por e-mail

        // Encaminhar o usuário para uma página onde ele deverá digitar o código enviado
        // por e-mail

        
    }
}