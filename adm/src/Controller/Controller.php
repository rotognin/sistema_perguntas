<?php

namespace Src\Controller;

use Src\Model\Usuario;

class Controller
{
    public static function login(array $post, array $get)
    {
        $params = http_build_query(["login" => verificarString($post['login'])]);
        $usuario = (new Usuario())->find('login = :login', $params)->fetch();

        if (!$usuario)
        {
            self::view('index', ['mensagem' => 'Usuário ou senha inválidos']);
            Exit;
        }

        if ($usuario->senha != sha1($post['senha'])){
            self::view('index', ['mensagem' => 'Usuário ou senha inválidos']);
            Exit;
        }

        if (NIVEL_USUARIO[$usuario->status] == 'Inativo'){
            self::view('index', ['mensagem' => 'Usuário inativo.']);
            Exit;
        }

        if (NIVEL_USUARIO[$usuario->status] != 'Administrador'){
            self::view('index', ['mensagem' => 'Usuário sem acesso ao Sistema Administrativo']);
            Exit;
        }

        $_SESSION['usuId'] = $usuario->id;
        $_SESSION['usuNome'] = $usuario->nome;

        self::menu();
    }

    public static function logout(array $post, array $get, string $mensagem = '')
    {
        session_unset();
        self::view('index', ['mensagem' => $mensagem]);
    }

    public static function home()
    {
        self::view('index');
    }

    public static function menu()
    {
        self::view('menu');
    }

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