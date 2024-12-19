<?php
class UsuarioController{
    var $usuario;

    public function comprobarLogin($u,$p){
        Usuario::comprobarLogin($u,$p);
    }

    public function inserta_usuario($u,$p){
        Usuario::inserta_usuario($u,$p);
    }
}