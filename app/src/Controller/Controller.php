<?php

namespace Src\Controller;

use Src\Model\Usuario;

class Controller
{
    /**
     * Realização de login do cliente no sistema
     */
    public static function login(array $post, array $get)
    {
        if (!isset($post['_token']) || $post['_token'] != $_SESSION['csrf']){
            self::logout();
            exit;
        }

        if ($post['login'] == '' || $post['senha'] == ''){
            self::view('login', ['mensagem' => 'Login ou senha inválidos']);
            Exit;
        }

        $params = http_build_query(["login" => verificarString($post['login'])]);
        $usuario = (new Usuario())->find('login = :login', $params)->fetch();

        if (!$usuario){
            self::view('login', ['mensagem' => 'Login ou senha inválidos']);
            Exit;
        }

        if ($usuario->senha != sha1($post['senha'])){
            self::view('login', ['mensagem' => 'Login ou senha inválidos']);
            Exit;
        }

        if (NIVEL_USUARIO[$usuario->status] != 'Ativo'){
            self::view('login', ['mensagem' => 'Acesso não autorizado.']);
            Exit;
        }

        $_SESSION['usuId'] = $usuario->id;
        $_SESSION['usuNome'] = $usuario->nome;
        $_SESSION['usuLogin'] = $usuario->login;

        self::principal();
    }

    /**
     * Saída do sistema
     */
    public static function logout()
    {
        session_unset();
        self::home();
    }

    /**
     * Zerar a sessão e voltar para o início
     */
    public static function home()
    {
        $_SESSION['usuId'] = 0;
        self::principal();
    }

    /**
     * Carregamento da tela principal do sistema
     */
    public static function principal()
    {
        // Chamada da View Index, depois que estiver logado
        self::view('index', ['logado' => estaLogado()]);
    }

    /**
     * Acesso à tela de login
     */
    public static function acesso()
    {
        criarCsrf();
        self::view('login');
    }

    /**
     * Chamar a view a ser exibida
     */
    public static function view(string $view, array $array = [])
    {
        $view = str_replace('.', DS, $view);
        $arquivo = '.' . DS . 'src' . DS . 'View' . DS . $view . '.php';

        if (!file_exists($arquivo)){
            echo '.... Arquivo não existe ... ' . $arquivo;
            die();
        }

        if (!empty($array)){
            foreach($array as $var => $valor){
                $$var = $var;
                $$var = $valor;
            }
        }

        ob_start();
        require_once $arquivo;
        $pagina = ob_get_contents();
        ob_end_clean();
        echo $pagina;
    }
}