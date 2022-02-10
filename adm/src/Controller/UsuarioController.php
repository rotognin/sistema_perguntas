<?php

namespace Src\Controller;

use Src\Model\Usuario;

class UsuarioController extends Controller
{
    public static function index()
    {
        $usuarios = (new Usuario())->find()->fetch(true);
        parent::view('usuarios.index', ['usuarios' => $usuarios]);
    }
}