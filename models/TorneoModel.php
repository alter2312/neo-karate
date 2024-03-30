<?php

class Torneo_model {
    private $db;
    private $torneo;
    private $equipos;

    public function __construct() {
        $this->db = Conectar::conexion();
        $this->torneo = array();
        $this->equipos = array();
    }

    public function getID() {
        $sql = "SELECT last_insert_id() id";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row["id"];
    }

    public function get_equipos_individual($genero) {
        $sql = "SELECT competidor.*, IDEquipo 
                FROM equipo
                JOIN competidor ON equipo.IDCompetidor = competidor.IDCompetidor
                WHERE equipo.Cantidad = 1 AND competidor.Genero = '$genero'";
        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $this->equipos[] = $row;
        }
        return $this->equipos;
    }

    public function get_equipos_grupal($genero) {
        $sql = "SELECT competidor.*, IDEquipo 
                FROM equipo
                JOIN competidor ON equipo.IDCompetidor = competidor.IDCompetidor
                WHERE equipo.Cantidad = 3 AND competidor.Genero = '$genero'";
        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $this->equipos[] = $row;
        }
        return $this->equipos;
    }

    public function crearTorneo($ubicacion, $fecha, $genero, $tipo, $estado) {
        $sql = "INSERT INTO torneo (Ubicacion, Fecha, Genero, Tipo, EstadoTorneo) VALUES ('$ubicacion', '$fecha', '$genero', '$tipo', '$estado')";
        $resultado = $this->db->query($sql);
        return $resultado;
    }

    public function ingresarEquipo($idEquipo, $idTorneo, $categoria) {
        $sql = "INSERT INTO compite (IDEquipo, IDTorneo, Categoria) VALUES ('$idEquipo', '$idTorneo', '$categoria')";
        $resultado = $this->db->query($sql);
        return $resultado;
    }

    public function ObtenerFechaNacimientoCompetidor($idCompetidor) {
        $sql = "SELECT Fecha_Nac FROM competidor WHERE IDCompetidor = '$idCompetidor'";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row["Fecha_Nac"];
    }
    public function get_torneos() {
        $sql = "SELECT * FROM torneo";
        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $this->torneo[] = $row;
        }
        return $this->torneo;
    }
    
    public function get_torneo($id) {
        $sql = "SELECT * FROM torneo WHERE IDTorneo = '$id' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }
    
    public function modificar_torneo($id, $genero,$tipo,$estado,$fecha, $ubicacion) {
        $resultado = $this->db->query("UPDATE torneo SET Genero='$genero',Tipo='$tipo', EstadoTorneo='$estado', Fecha='$fecha', Ubicacion='$ubicacion' WHERE IDTorneo = '$id'");
    }
    
   public function finalizar_torneo($id, $estado) {
    $resultado = $this->db->query("UPDATE torneo SET EstadoTorneo='$estado' WHERE IDTorneo = '$id'");

   }
   public function getEstadoTorneo($idTorneo) {
    $sql = "SELECT EstadoTorneo FROM torneo WHERE IDTorneo = '$idTorneo'";
    $resultado = $this->db->query($sql);
    $row = $resultado->fetch_assoc();
    return $row['EstadoTorneo'];
}
    public function vaciar_tabla_compite($id) {
        $resultado = $this->db->query("DELETE FROM compite where IDTorneo = '$id'");
    }
    
    public function eliminar_torneo($id) {
        // Primero eliminamos las relaciones del torneo en la tabla 'compite'
        $resultado1 = $this->db->query("DELETE FROM compite WHERE IDTorneo = '$id'");
        // Eliminamos las relaciones del torneo en la tabla 'componen'
        $resultado2 = $this->db->query("DELETE FROM componen WHERE IDTorneo = '$id'");
        $resultado3 = $this->db->query("DELETE  from asiste where IDTorneo ='$id'");
        $resultado4 = $this->db->query("DELETE from seencuentraen where IDTorneo='$id'");
        if ($resultado1 && $resultado2 && $resultado3 && $resultado4) {
            // Luego eliminamos el torneo de la tabla 'torneo'
            $resultado = $this->db->query("DELETE FROM torneo WHERE IDTorneo = '$id'");
        }
    }
    
}

