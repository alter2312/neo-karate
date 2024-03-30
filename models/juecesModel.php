<?php 
class Jueces_model{
    private $db;
    private $puntaje;

    public function __construct(){
        $this->db = Conectar::conexion();
        $puntaje= array();
    }
    public function insertar_puntaje($puntaje){
        $resultado = $this->db->query("INSERT INTO puntaje (puntaje) VALUES ('$puntaje')");  
    }
}
?>