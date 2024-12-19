<?php

class Usuario {
    private $id;
    private $usuario;
    private $password;
    

    private static $usuarios;

    function __construct($miId = -1,$miUsuario,$miPassword){
        $this->id=$miId;
        $this->usuario=$miUsuario;
        $this->password=$miPassword;
    }

    function setId($miId){
        $this->id=$miId;
    }

    function getId(){
        return $this->id;
    }

    function setUsuario($miUsuario){
        $this->usuario=$miUsuario;
    }

    function getUsuario(){
        return $this->usuario;
    }

    function setPassword($miPassword){
        $this->password=$miPassword;
    }

    function getPassword(){
        return $this->password;
    }

    public static function comprobarLogin($u, $p) {
        $conexion = new PDO("mysql:host=localhost;dbname=protectora", "root", "");
    
        $sql = $conexion->prepare("SELECT `password` FROM USUARIOS WHERE `USUARIO` = :usuario");
        $sql->bindValue(":usuario", $u);
        $sql->execute();
    
        if ($sql->rowCount() > 0) {
            $resultado = $sql->fetch(PDO::FETCH_ASSOC);
            $hash_almacenado = $resultado['password'];
            if (password_verify($p, $hash_almacenado)) {
                session_start();
                $_SESSION["usuario"] = $u;
                header("Location:/mvcProtectora/index.php");
                exit;
            }
        }
        header("Location: /mvcProtectora/view/login.html");
    }
    

    public static function inserta_usuario($u,$p){
        $conexion= new PDO("mysql:host=localhost;dbname=protectora", "root", "");
        $p_cifrada=password_hash($p,PASSWORD_DEFAULT);
        $sql = $conexion->exec("INSERT INTO usuarios (`USUARIO`, `PASSWORD`) VALUES ('$u', '$p_cifrada')");
        header("Location:/mvcProtectora/index.php");
    }

}