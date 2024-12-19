<?php

class Animal {
    private $id;
    private $nombre;
    private $sexo;
    private $descripcion;
    private $img;
    

    private static $animales;

    function __construct($miId = -1,$miNombre,$miSexo,$miDescripcion,$miImg){
        $this->id=$miId;
        $this->nombre=$miNombre;
        $this->sexo=$miSexo;
        $this->descripcion=$miDescripcion;
        $this->img=$miImg;
    }

    function setNombre($miNombre){
        $this->nombre=$miNombre;
    }

    function getNombre(){
        return $this->nombre;
    }

    function setDescripcion($miDescripcion){
        $this->descripcion=$miDescripcion;
    }

    function getDescripcion(){
        return $this->descripcion;
    }

    function setId($miId){
        $this->id=$miId;
    }

    function getId(){
        return $this->id;
    }

    function setSexo($miSexo){
        $this->sexo=$miSexo;
    }

    function getSexo(){
        return $this->sexo;
    }

    function setImg($miImg){
        $this->img=$miImg;
    }

    function getImg(){
        return $this->img;
    }

    public static function obtenerAnimales(){
        $conexion= new PDO("mysql:host=localhost;dbname=protectora", "root", "");
        $row = $conexion->query('SELECT id, nombre, sexo,descripcion, img FROM animales');
        self::$animales = null;

        foreach($row as $row2){
            $animal = new Animal($row2["id"],$row2["nombre"],$row2["sexo"],$row2["descripcion"], $row2["img"]);

            self::$animales[]=$animal;
        }
        
        return self::$animales;
    }

    public static function eliminarAnimal($id){
        $conexion= new PDO("mysql:host=localhost;dbname=protectora", "root", "");
        $row = $conexion->exec("DELETE FROM animales WHERE id=$id");
        header("Location:/mvcProtectora/index.php");
    }

    public static function anadirAnimal($nombre,$sexo,$descripcion,$imagen){
        $conexion= new PDO("mysql:host=localhost;dbname=protectora", "root", "");
        $conexion->exec("INSERT INTO `animales` (`nombre`,`sexo`,`descripcion`,`img`) VALUES ('$nombre','$sexo','$descripcion','$imagen');");
        header("Location: /mvcProtectora/index.php");
    }

    
}