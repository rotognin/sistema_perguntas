<?php

namespace Src\Controller;

use Src\Model\Usuario;

class UsuarioController extends Controller
{
    /**
     * Página principal, com a listagem dos usuários cadastrados
     */
    public static function index(array $post = [], array $get = [], string $mensagem = '')
    {
        $usuarios = (new Usuario())->find()->fetch(true);
        parent::view('usuario.index', ['usuarios' => $usuarios, 'mensagem' => $mensagem]);
    }

    /**
     * Chamada ao formulário para cadastrar um novo usuário
     */
    public static function novo(array $post, array $get, string $mensagem = '')
    {
        criarCsrf();
        parent::view('usuario.novo', ['acao' => 'novo', 'mensagem' => $mensagem]);
    }

    /**
     * Chamada ao formulário para alteração de um registro
     */
    public static function alterar(array $post, array $get, string $mensagem = '')
    {
        criarCsrf();
        $usuario = (new Usuario())->findById($post['id']);
        $usuario->senha = '';

        parent::view('usuario.alterar', ['usuario' => $usuario, 'acao' => 'alterar', 'mensagem' => $mensagem]);
    }

    /**
     * Voltar ao formulário caso alguma validação não tenha passado
     */
    public static function voltarAoFormulario(Usuario $usuario, array $post, array $get, string $mensagem = '')
    {
        criarCsrf();
        $usuario->senha = '';

        if ($post['acao'] = 'novo'){
            parent::view('usuario.novo', ['usuario' => $usuario, 'acao' => 'novo', 'mensagem' => $mensagem]);
        } else {
            parent::view('usuario.alterar', ['usuario' => $usuario, 'acao' => 'novo', 'mensagem' => $mensagem]);
        }
    }

    /**
     * Verificar se um registro existe para o login informado
     */
    public static function loginExiste(string $login)
    {
        $params = http_build_query(['login' => $login]);
        $login = (new Usuario())->find('login = :login', $params)->fetch(true);

        return $login;
    }

    /**
     * Inativar um usuário
     */
    public static function inativar(array $post, array $get)
    {
        self::alterarStatus($post['id'], STATUS_USUARIO['Inativo']);
    }

    /**
     * Ativar um usuário
     */
    public static function ativar(array $post, array $get)
    {
        self::alterarStatus($post['id'], STATUS_USUARIO['Ativo']);
    }

    /**
     * ALteração de status do registro
     */
    public static function alterarStatus(int $id, int $status)
    {
        $usuario = (new Usuario())->findById($id);
        $usuario->status = $status;

        $mensagem = '';

        if (!$usuario->save()){
            $mensagem = 'Não foi possível alterar a situação do usuário.';
        }

        self::index([], [], $mensagem);
    }

    /**
     * Gravação ou regravação de um usuário
     */
    public static function gravar(array $post, array $get)
    {
        if (!isset($post['_token']) || $post['_token'] != $_SESSION['csrf']){
            parent::logout($post, $get, 'Acesso incorreto. Realize um novo login.');
            exit;
        }

        if ($post['acao'] == 'novo'){
            $usuario = new Usuario();
        } else {
            $usuario = (new Usuario())->findById($post['id']);
        }

        $usuario->nome = verificarString($post['nome']);
        $usuario->login = verificarString($post['login']);
        $usuario->email = verificarString($post['email']);
        $usuario->status = $post['status'];

         // Fazer a validação dos dados
         $valores = array(
            $post['nome'],
            $post['login'],
            $post['email']
        );

        if (verificarEmBranco($valores)){
            self::voltarAoFormulario($usuario, $post, $get, 'Existem campos em branco. Favor preenchê-los');
            exit;
        }

        if ($post['acao'] == 'novo'){
            if (self::loginExiste($usuario->login)){
                self::voltarAoFormulario($usuario, $post, $get, 'Já existe um usuário com esse login');
                exit;
            }

            if ($post['senha'] == ''){
                self::voltarAoFormulario($usuario, $post, $get, 'A senha deve ser preenchida.');
                exit;
            }

            $usuario->senha = sha1($post['senha']);
        } else {
            if ($post['senha'] != ''){
                $usuario->senha = sha1($post['senha']);
            }
        }

        if (!filter_var($usuario->email, FILTER_VALIDATE_EMAIL)){
            self::voltarAoFormulario($usuario, $post, $get, 'E-mail inválido');
            exit;
        }

        if (!$usuario->save()){
            $mensagem = 'Não foi possível gravar o usuário.';
            self::voltarAoFormulario($usuario, $post, $get, $mensagem);
            exit;
        }

        self::index([], [], 'Usuário gravado com sucesso.');
    }
}