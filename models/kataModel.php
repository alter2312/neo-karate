<?php
class Kata_model {
    private $db;
    private $katas;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->katas = array();
    }

    public function get_katas(){
        $sql = "SELECT * FROM kata";
        $resultado = $this->db->query($sql);
        while($row = $resultado->fetch_assoc()){
            $this->katas[] = $row;
        }
        return $this->katas;
    }

    public function insertar($NumKata, $nombre){
        $resultado = $this->db->query("INSERT INTO kata (NumKata, Nombre) VALUES ('$NumKata', '$nombre')");
    }

    public function modificar($NumKata, $nombre){
        $this->db->query("UPDATE kata SET Nombre='$nombre' WHERE NumKata = '$NumKata'");
    }

    public function eliminar($NumKata){
        $resultado=$this->db->query("DELETE FROM realiza WHERE NumKata = '$NumKata'");
        if($resultado){
            $resultado1= $this->db->query("DELETE FROM constituye WHERE NumKata = '$NumKata'");
            if($resultado1){
                $resultado2= $this->db->query("DELETE FROM puntaje WHERE NumKata = '$NumKata'");
                if($resultado2){
                    $this->db->query("DELETE FROM kata WHERE NumKata = '$NumKata'");
                    
                }
            }
        }

    }

    public function get_kata($NumKata){
        $sql = "SELECT * FROM kata WHERE NumKata='$NumKata' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }
}
?>