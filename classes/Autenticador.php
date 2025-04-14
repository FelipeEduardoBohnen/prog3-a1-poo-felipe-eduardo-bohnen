<?php
require_once 'Usuario.php';

class Autenticador {
    private static $usuarios = [];

    public static function registrar(Usuario $usuario) {
        self::$usuarios[] = $usuario;
    }

    public static function logar($email, $senha) {
        foreach (self::$usuarios as $usuario) {
            if ($usuario->autenticar($email, $senha)) {
                return $usuario;
            }
        }
        return null;
    }
}
