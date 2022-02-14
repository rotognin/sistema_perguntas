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
        $usuario->nome  = verificarString($post['nome']);
        $usuario->login = verificarString($post['login']);
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

        if ($usuario->loginExiste()){
            $mensagem .= 'O login escolhido já existe.<br>';
        }

        if ($mensagem != ''){
            // Voltar para a view
            parent::view('usuario.cadastro', ['mensagem' => $mensagem, 'usuario' => $usuario]);
            exit;
        }

        $usuario->status = 3; // Pendente de ativação
        $usuario->gerarCodigoConfirmacao();

        // Gravar o registro
        $usuario->save();

        // Enviar um código por e-mail
        $assunto = 'Cadastro no sistema de Perguntas e Respostas';
        $mensagem = novoUsuario($usuario->nome, $usuario->codigo);
        enviarEmail($usuario->email, $assunto, $mensagem);

        // Encaminhar o usuário para uma página onde ele deverá digitar o código enviado
        // por e-mail
        criarCsrf();
        parent::view('usuario.confirmacao', ['usuario' => $usuario]);
    }

    public static function confirmacao(array $post, array $get)
    {
        if (!isset($post['_token']) || $post['_token'] != $_SESSION['csrf']){
            parent::logout($post, $get, 'Acesso incorreto. Realize um novo login.');
            exit;
        }

        $id = filter_var($post['id'], FILTER_VALIDATE_INT);
        $codigo = $post['codigo'];
        $login = verificarString($post['login']);

        $usuario = (new Usuario())->findById($id);

        $mensagem = '';

        if (!$usuario || $usuario->login != $login || $codigo != $usuario->codigo){
            $mensagem = 'Login ou código incorreto.';
            parent::view('usuario.confirmacao', ['usuario' => $usuario, 'mensagem' => $mensagem]);
            exit;
        }

        $usuario->status = 1;
        $usuario->codigo = 000000;
        $usuario->save();

        parent::view('usuario.confirmado');
    }
}