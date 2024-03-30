<?php

class LlaveModel {
    private $db;

    public function __construct() {
        $this->db = Conectar::conexion();
    }

    public function getIDTorneo() {
        $sql = "SELECT IDTorneo AS id FROM torneo ORDER BY IDTorneo DESC LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row["id"];
    }
    public function getIDLlave() {
        $sql = "SELECT IDLlave AS id FROM llave ORDER BY IDllave DESC LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row["id"];
    }

    public function cantidadEquipos($idTorneo){
        $sql = "SELECT COUNT(IDEquipo) AS 'cantidad', Categoria FROM compite WHERE IDTorneo = $idTorneo GROUP BY Categoria";
        $resultado = $this->db->query($sql);
        $cantidad = array();
        while ($row = $resultado->fetch_assoc()) {
            $cantidad[] = $row;
        }
        return $cantidad;
    }
 public function cantidadEquiposEnLlave($idLlave) {
    $sql = "SELECT COUNT(*) as'cantidad' FROM seencuentraen WHERE IDLlaveRojo = $idLlave OR IDLlaveAzul = $idLlave";
    
    return $this->db->query($sql)->fetch_column();
}

    public function cantEquiposCategoria($idTorneo, $categoria) {
        $sql = "SELECT COUNT(IDEquipo) AS 'cantidad', Categoria FROM compite WHERE IDTorneo = $idTorneo AND Categoria = '$categoria'";
        $resultado = $this->db->query($sql);
        $cantidad = array();
        while ($row = $resultado->fetch_assoc()) {
            $cantidad[] = $row;
        }
        return $cantidad;
    }

    public function getEquiposCategoriaTorneo($idTorneo, $categoria) {
        $sql = "SELECT IDEquipo FROM compite WHERE IDTorneo = $idTorneo AND Categoria = '$categoria'";
        $resultado = $this->db->query($sql);
        $equipos = array();
        while ($row = $resultado->fetch_assoc()) {
            $equipos[] = $row['IDEquipo'];
        }
        return $equipos;
    }

    public function crearLlave($categoria, $color) {
        $sql = "INSERT INTO llave (Categoria, Color) VALUES ('$categoria', '$color')";
        $resultado = $this->db->query($sql);
        return $this->db->insert_id;
    }

    public function agregarEquiposLlave($idTorneo, $idLlave, $IDEquipo) {
        $alejo=true;
            $sql = "INSERT INTO seencuentraen (IDEquipo, IDLlave, IDTorneo) VALUES ($IDEquipo, $idLlave, $idTorneo)";
            $resultado = $this->db->query($sql);   
            if (!$resultado) {
                $alejo = false;
            
        }
        return $alejo;
    }
    public function crearRonda($idllave, $estado){
         $sql= ("INSERT INTO ronda (IDLlave, EstadoRonda) values ('$idllave', '$estado')");
        $resultado = $this->db->query($sql);
        if($resultado){
            return $this->db->insert_id;
        }
        else{
            return null;
        }
    }

    public function insertar_realiza ($idEquipo, $num_kata){
         $this->db->query("INSERT into realiza (IDEquipo, NumKata) values($idEquipo, $num_kata) ");
    }
      
    public function validarKata($num_kata, $nombre){
        $sql = "SELECT * FROM kata WHERE NumKata = $num_kata AND nombre = '$nombre'";
        $resultado = $this->db->query($sql);
        return $resultado->num_rows > 0;
    }
    public function getRealiza(){
        $sql = "SELECT * FROM `realiza` ORDER by IDEquipo, NumKata  DESC LIMIT 1 ";
        $resultado = $this->db->query($sql);
        $realiza=[];
        while($row = $resultado->fetch_assoc())
			{
				$realiza[] = $row;
			}
			return $realiza;
    

    }

    public function getIdRonda($idllave){
        $sql = "SELECT IDRonda FROM ronda WHERE IDLlave = $idllave";
        $resultado = $this->db->query($sql);
        if ($resultado){
            $row = $resultado->fetch_assoc();
            return $row["IDRonda"];
        }
        return null; 
    }

    public function asignarRonda($idRonda, $realiza){
        $idEquipo =0;
        $numKata= 0;
        foreach ($realiza as $value){
            $numKata = $value["NumKata"];
            $idEquipo= $value["IDEquipo"];
        }
       $resultado= $this->db->query( "INSERT into constituye (IDEquipo, IDRonda, NumKata) values ($idEquipo, '$idRonda', $numKata)");
        var_dump($resultado);
    }
    public function getEquiposEnLlave() {
        $sql = "SELECT equipo.IDEquipo, competidor.CI, CONCAT(competidor.Nombre, ' ', competidor.Apellido) AS Nombre
                FROM seencuentraen
                JOIN llave ON seencuentraen.IDLlave = llave.IDLlave
                JOIN compite ON seencuentraen.IDEquipo = compite.IDEquipo
                JOIN equipo ON compite.IDEquipo = equipo.IDEquipo
                JOIN competidor ON equipo.IDCompetidor = competidor.IDCompetidor
                WHERE equipo.Cantidad = 3";
        $resultado = $this->db->query($sql);
        $equipos = array();
    
        while ($row = $resultado->fetch_assoc()) {
            $equipos[] = $row;
        }
    
        return $equipos;
    }

    public function getCantidadLlaves($idTorneo) {
        $sql = "SELECT COUNT(*) AS cantidad FROM seencuentraen 
                join torneo
                on seencuentraen.IDTorneo = torneo.IDTorneo
                join llave
                on llave.IDLlave = seencuentraen.IDLlave
                WHERE seencuentraen.IDTorneo = $idTorneo
                group by llave.Categoria ";
        $resultado = $this->db->query($sql);
        $cantidad=[];
        if(!empty($resultado)){
            while ($row = $resultado->fetch_assoc()) {
                $cantidad[] = $row;
            }
        
            return $cantidad;
        }
        else{
            return false;
        }
    }

    public function getCompetidoresEnLlave($idtorneo, $categoria) {
        $sql = "SELECT equipo.IDEquipo, competidor.CI, CONCAT(competidor.Nombre, ' ', competidor.Apellido) AS Nombre
                FROM seencuentraen
                JOIN llave ON seencuentraen.IDLlave = llave.IDLlave
                JOIN compite ON seencuentraen.IDEquipo = compite.IDEquipo
                JOIN equipo ON compite.IDEquipo = equipo.IDEquipo
                JOIN competidor ON equipo.IDCompetidor = competidor.IDCompetidor
                JOIN Torneo ON Torneo.IDTorneo = seencuentraen.IDTorneo
                WHERE Torneo.IDTorneo = $idtorneo AND equipo.Cantidad = 1 AND llave.Categoria = '$categoria'
                GROUP BY equipo.idEquipo" ;
        $resultado = $this->db->query($sql);
        $equipos = array();
    
        while ($row = $resultado->fetch_assoc()) {
            $equipos[] = $row;
        }
    
        return $equipos;
    }

    public function getCantidadCompetidoresEnLlave($idtorneo) {
    $sql = "SELECT count(seencuentraen.IDEquipo) AS cantidad
            FROM seencuentraen
            JOIN llave ON seencuentraen.IDLlave = llave.IDLlave
            JOIN compite ON seencuentraen.IDEquipo = compite.IDEquipo
            JOIN equipo ON compite.IDEquipo = equipo.IDEquipo
            JOIN competidor ON equipo.IDCompetidor = competidor.IDCompetidor
            JOIN Torneo ON Torneo.IDTorneo = seencuentraen.IDTorneo
            WHERE Torneo.IDTorneo = $idtorneo 
            group by seencuentraen.IDllave
            ";

    $resultado = $this->db->query($sql);
    $row = $resultado->fetch_assoc();
    var_dump($row);
    return $row['cantidad'];
}
    public function getIDEquipo($ci, $idTorneo) {
        $sql = "SELECT equipo.IDEquipo
                FROM seencuentraen
                JOIN llave ON seencuentraen.IDLlave = llave.IDLlave
                JOIN compite ON seencuentraen.IDEquipo = compite.IDEquipo
                JOIN equipo ON compite.IDEquipo = equipo.IDEquipo
                JOIN competidor ON equipo.IDCompetidor = competidor.IDCompetidor
                JOIN Torneo ON Torneo.IDTorneo = seencuentraen.IDTorneo
                WHERE competidor.CI = $ci and torneo.IDTorneo = $idTorneo";
    
        $resultado = $this->db->query($sql);
    
        if ($resultado && $resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            return $row["IDEquipo"];
        }
    
        return null; // Devolver null si no se encuentra el equipo.
    }
    


    public function getTipoTorneo($idTorneo){
        $sql ="SELECT tipo from torneo where IDTorneo = $idTorneo";
        $resultado = $this->db->query($sql);
        return $resultado->num_rows > 0;    
    }


    public function getCompetidoresCategoriaLlave($idtorneo, $categoria) {
        $sql = "SELECT equipo.IDEquipo, competidor.CI, CONCAT(competidor.Nombre, ' ', competidor.Apellido) AS Nombre
                FROM seencuentraen
                JOIN llave ON seencuentraen.IDLlave = llave.IDLlave
                JOIN compite ON seencuentraen.IDEquipo = compite.IDEquipo
                JOIN equipo ON compite.IDEquipo = equipo.IDEquipo
                JOIN competidor ON equipo.IDCompetidor = competidor.IDCompetidor
                JOIN Torneo ON Torneo.IDTorneo = seencuentraen.IDTorneo
                WHERE Torneo.IDTorneo = $idtorneo and equipo.Cantidad = 1 and compite.Categoria =$categoria
                group by equipo.idEquipo" ;
        $resultado = $this->db->query($sql);
        $equipos = array();
    
        while ($row = $resultado->fetch_assoc()) {
            $equipos[] = $row;
        }
    
        return $equipos;
    }
   
    public function getCompetidoresLlave($idLlave) {
        $sql = "SELECT equipo.IDEquipo
                FROM seencuentraen
                JOIN llave ON seencuentraen.IDLlave = llave.IDLlave
                JOIN compite ON seencuentraen.IDEquipo = compite.IDEquipo
                JOIN equipo ON compite.IDEquipo = equipo.IDEquipo
                JOIN competidor ON equipo.IDCompetidor = competidor.IDCompetidor
                WHERE llave.IDLlave = $idLlave";
        $resultado = $this->db->query($sql);
        $competidores = array();
    
        while ($row = $resultado->fetch_assoc()) {
            $competidores[] = $row;
        }
    
        return $competidores;
    }
}

?>
