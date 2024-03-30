<?php
class KatasController {
    public function __construct(){
        require_once "models/kataModel.php";
    }

    public function index(){
        $katas = new Kata_model();
        $data["titulo"] = "Katas";
        $data["katas"] = $katas->get_katas();
        require_once "views/katas/katas.php";    
    }

    public function nuevo(){
        $data["titulo"] = "Katas";
        require_once "views/katas/kata_nuevo.php";
    }

    public function guarda(){
        $Numkata = $_POST['NumKata'];
        $nombre = $_POST['nombre'];
        $katas = new Kata_model();
        $katas->insertar($Numkata, $nombre);
        $this->index();
    }

    public function modificar($NumKata){
        $katas = new Kata_model();
        $data["katas"] = $katas->get_kata($NumKata);
        require_once "views/katas/kata_modificar.php";
    }

    public function actualizar(){
        $NumKata = $_POST['NumKata'];
        $nombre = $_POST['nombre'];
        $katas = new Kata_model();
        $katas->modificar($NumKata, $nombre);
        $this->index();
    }

    public function eliminar($IDKata){
        $katas = new Kata_model();
        $katas->eliminar($IDKata);
        $this->index();
    }    
}
?>