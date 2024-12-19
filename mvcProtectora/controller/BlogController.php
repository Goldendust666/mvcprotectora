<?php
class BlogController{
    var $blogs;

    function __construct(){
        $this->blogs = Blog::obtenerBlogs();
    }

    public function index(){
        $blogRowset=$this->blogs;
        return $blogRowset;
    }

    public function formPost(){
        require("view/postFormulario.html");
    }

    public function nuevoPost($titulo,$comentarios,$nombreArchivo){
        Blog::nuevoPost($titulo,$comentarios,$nombreArchivo);
    }

}