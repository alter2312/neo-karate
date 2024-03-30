<?php
class DojoController {
		
    public function __construct(){
        require_once "models/dojoModel.php";
    }
    
    public function index(){
        
        
        $dojo = new Dojo_model();
        $data["titulo"] = "Dojos";
        $data["dojos"] = $dojo->get_dojos();
        
        require_once "views/dojos/dojos.php";	
    }
    
    public function nuevo(){
        
        $data["titulo"] = "Dojos";
        require_once "views/dojos/dojos_nuevos.php";
    }
    
  
    
    public function guarda(){
        
        $nombre = $_POST['nombre'];
        $escuela = $_POST['escuela'];
        $dojo = new Dojo_model();
        $dojo->insertar($nombre, $escuela);
        $data["titulo"] = "Dojos";
        $this->index();
        
    }    
    public function modificar($idDojo){
        
        $dojos = new Dojo_model();
        
        $data["idDojo"] = $idDojo;
        $data["dojos"] = $dojos->get_dojo($idDojo);
        $data["titulo"] = "Dojos";
        require_once "views/dojos/dojos_modificar.php";
    }
    
    public function actualizar(){

        $idDojo = $_POST['idDojo'];
        $nombre = $_POST['nombre'];
        $escuela = $_POST['escuela'];

        $dojos = new Dojo_model();
        $dojos->modificar($idDojo, $nombre, $escuela);
        $data["titulo"] = "Dojos";
        $this->index();
    }
    
    public function eliminar($idDojo){
        
        $dojos = new Dojo_model();
        $dojos->eliminar($idDojo);
        $data["titulo"] = "Dojos";
        $this->index();
    }	
}
