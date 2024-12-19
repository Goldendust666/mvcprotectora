<?php

require("./model/Animal.php");
require("./controller/AnimalesController.php");
require("./model/Usuario.php");
require("./controller/UsuarioController.php");
require("./model/Blog.php");
require("./controller/BlogController.php");

$controller = new AnimalesController;
$usuController = new UsuarioController;
$postController = new BlogController;


$home="/mvcProtectora/index.php/";

$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);

$array_ruta= array_filter(explode("/", $ruta));


if(isset($array_ruta[0]) && $array_ruta[0]== "baja"){
    $controller-> baja($_POST['id']);
}

elseif(isset($array_ruta[0]) && $array_ruta[0]== "alta"){
    $controller-> verFormulario();
}

elseif(isset($array_ruta[0]) && $array_ruta[0]== "altaAnimal"){
    $nombre = $_POST['nombre'];
    $sexo = $_POST['sexo'];
    $descripcion=$_POST['descripcion'];
    $imagen = $_FILES['imagen'];
    $nombreTemporal = $imagen['tmp_name'];
    $nombreArchivo = basename($imagen['name']);
    $directorioDestino = 'uploads/';
    move_uploaded_file($nombreTemporal, $directorioDestino.$nombreArchivo);
    $controller-> altaAnimal($nombre,$sexo,$descripcion,$nombreArchivo);
}

elseif(isset($array_ruta[0]) && $array_ruta[0]== "post"){
    $postController-> formPost();
}

elseif(isset($array_ruta[0]) && $array_ruta[0]== "nuevoPost"){
    $titulo = $_POST['titulo'];
    $comentarios = $_POST['comentarios'];
    $imagenPost = $_FILES['imagenBlog'];
    $nombreTemporal = $imagenPost['tmp_name'];
    $nombreArchivo = basename($imagenPost['name']);
    $directorioDestino = 'uploads/';
    move_uploaded_file($nombreTemporal, $directorioDestino.$nombreArchivo);
    $postController-> nuevoPost($titulo,$comentarios,$nombreArchivo);
}


elseif(isset($array_ruta[0]) && $array_ruta[0]== "login" ){
    header("location: /mvcProtectora/view/login.html");
}


elseif(isset($array_ruta[0]) && $array_ruta[0]== "comprueba_login" ){
    $usuario=$_POST['usuario'];
    $contrasena=$_POST['password'];
    $usuController-> comprobarLogin($usuario,$contrasena);
}

elseif(isset($array_ruta[0]) && $array_ruta[0]== "registrarse" ){
    header("location:/mvcProtectora/view/registrarse.html");
}

elseif(isset($array_ruta[0]) && $array_ruta[0]== "insertar_usuario" ){
    $usuario=$_POST['usuario'];
    $contrasena=$_POST['password'];
    $usuController-> inserta_usuario($usuario,$contrasena);
}else{
    $controller->index();
}