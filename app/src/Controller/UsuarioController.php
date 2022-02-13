<?php

namespace Src\Controller;

use Src\Model\Usuario;

class UsuarioController extends Controller
{
    public static function registro()
    {
        criarCsrf();
        parent::view('usuario.cadastro', ['mensagem' => '']);
    }

    public static function gravar(array $post, array $get)
    {
        if (!isset($post['_token']) || $post['_token'] != $_SESSION['csrf']){
            parent::logout($post, $get, 'Acesso incorreto. Realize um novo login.');
            exit;
        }

        $usuario = new Usuario();
        $usuario->nome = verificarString($post['nome']);
        $usuario->login = verificarString($post['email']);
        $usuario->email = verificarString($post['email']);
        $usuario->senha = verificarString(sha1($post['senha']));

        // Fazer as validações
        $mensagem = '';

        if (strlen($usuario->nome) < 8){
            $mensagem .= 'O nome deve conter pelo menos 8 caracteres.<br>';
        }

        if (strlen($usuario->login) < 5){
            $mensagem .= 'O login deve conter pelo menos 5 caratceres.<br>';
        }

        if (!filter_var($usuario->email, FILTER_VALIDATE_EMAIL)){
            $mensagem .= 'E-mail inválido.<br>';
        }

        if ($post['senha'] != $post['senha_novamente']){
            $mensagem .= 'As senhas devem ser iguais.<br>';
        }

        if ($post['senha'] == ''){
            $mensagem .= 'A senha deve ser informada.<br>';
        }

        if ($mensagem != ''){
            // Voltar para a view
            parent::view('usuario.cadastro', ['mensagem' => $mensagem, 'usuario' => $usuario]);
            exit;
        }

        $usuario->status = 3; // Pendente de ativação

        // Gravar o registro
        $usuario->save();

        // Enviar um código por e-mail

        // Encaminhar o usuário para uma página onde ele deverá digitar o código enviado
        // por e-mail
        parent::view('usuario.pendente', ['usuario' => $usuario]);
    }
}