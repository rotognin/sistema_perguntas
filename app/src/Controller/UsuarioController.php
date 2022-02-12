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
}