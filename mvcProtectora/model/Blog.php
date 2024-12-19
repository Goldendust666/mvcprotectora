<?php

class Blog {
    private $id;
    private $titulo;
    private $fecha;
    private $comentario;
    private $img;

    private static $blogs;

    public function __construct($id = null, $titulo = null, $fecha = null, $comentario = null, $img = null) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->fecha = $fecha;
        $this->comentario = $comentario;
        $this->img = $img;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function getImg() {
        return $this->img;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function setImg($img) {
        $this->img = $img;
    }

    public static function obtenerBlogs(){
        $conexion= new PDO("mysql:host=localhost;dbname=protectora", "root", "");
        $row = $conexion->query('SELECT id, titulo, fecha , comentario, img FROM blog');
        self::$blogs = null;

        foreach($row as $row2){
            $blog = new Blog($row2["id"],$row2["titulo"],$row2["fecha"],$row2["comentario"], $row2["img"]);

            self::$blogs[]=$blog;
        }
        
        return self::$blogs;
    }

    public static function nuevoPost($titulo,$comentarios,$nombreArchivo){
        $conexion= new PDO("mysql:host=localhost;dbname=protectora", "root", "");
        $conexion->exec("INSERT INTO `blog` (`titulo`,`comentario`,`img`) VALUES ('$titulo','$comentarios','$nombreArchivo');");
        header("Location: /mvcProtectora/index.php");
    }

}

?>
