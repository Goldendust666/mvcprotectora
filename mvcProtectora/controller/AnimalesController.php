<?php
class AnimalesController{
    var $animales;

    function __construct(){
        $this->animales = Animal::obtenerAnimales();
    }

    public function index(){
        $rowset=$this->animales;
        $postController = new BlogController;
        $blogRowset=$postController->index();
        require("view/index.php");
    }

    public function ver($id){
        
        $row = Animal::obtenerAnimales($id);
        require("view/ver.php");
    }

    public function baja($id){
            $borrado = Animal::eliminarAnimal($id);
            if($borrado==1){
                echo("el animal se ha borrado");
            }
        
    }

    public function verFormulario(){
        require("view/formularioAnimal.php");
        
    }

    public function altaAnimal($nombre,$sexo,$descripcion,$imagen){
        Animal::anadirAnimal($nombre,$sexo,$descripcion,$imagen);
    }
}