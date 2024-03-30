<?php
class Coach_model {

    private $db;
    private $coach;

    public function __construct() {
        $this->db = Conectar::conexion();
        $this->coach = array();
    }

    public function get_coaches() {
        $sql = "SELECT coach.*, dojo.nombreDojo AS dojo
                FROM coach
                JOIN dirige ON coach.CI = dirige.CI
                JOIN dojo ON dirige.IDDojo = dojo.IDDojo;";
        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $this->coach[] = $row;
        }
        return $this->coach;
    }

    public function insertar_coach($CI, $nombre, $apellido, $telefono) {
        $resultado = $this->db->query("INSERT INTO coach (CI, Nombre, Apellido, Telefono ) VALUES ('$CI', '$nombre', '$apellido', '$telefono')");
    }

    public function modificar_coach($CI, $nombre, $apellido, $telefono) {
        $resultado = $this->db->query("UPDATE coach SET Nombre='$nombre', Apellido='$apellido', Telefono='$telefono' WHERE CI = '$CI'");
    }

    public function eliminar_coach($CI) {
        $resultado = $this->db->query("DELETE FROM dirige WHERE CI = '$CI'");

        if ($resultado) {
            $resultado = $this->db->query("DELETE FROM coach WHERE CI = '$CI'");
        }
    }

    public function get_coach($CI) {
        $sql = "SELECT coach.*, dojo.NombreDojo AS dojo
                FROM coach
                JOIN dirige ON coach.CI = dirige.CI
                JOIN dojo ON dirige.IDDojo = dojo.IDDojo
                WHERE coach.CI ='$CI' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }

    public function getIdDojo($nombre) {
        $sql = "SELECT IDDojo from dojo where NombreDojo='$nombre'";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
            return $row["IDDojo"];
       
    }

    public function validarDojoExistente($nombreDojo) {
        $sql = "SELECT * FROM dojo WHERE NombreDojo = '$nombreDojo'";
        $resultado = $this->db->query($sql);
    
        if ($resultado->num_rows == 1) {
            return true; 
        } else {
            return false; 
        }
    }

    public function dirige($CI, $idDojo) {
        $this->db->query("INSERT into dirige(CI, IDDojo) values ('$CI', '$idDojo')");
    }

    public function modificar_dirige($CI, $idDojo) {
        $this->db->query("UPDATE dirige SET IDDojo='$idDojo' WHERE CI = '$CI'");
    }

    public function insertar_competidor($CI, $nombre, $apellido, $fecha_nac, $genero, $idDojo) {
        $resultado = $this->db->query("INSERT INTO competidor (CI, Nombre, Apellido, Fecha_Nac, Genero, IDDojo) VALUES ('$CI', '$nombre', '$apellido', '$fecha_nac', '$genero', '$idDojo')");
        if ($resultado) {
            return $this->db->insert_id;
        } else {
            return false;
        }
    }

    public function crearEquipo($IDCompetidor, $cantidad) {
        $resultado = $this->db->query("INSERT into equipo (IDCompetidor, Cantidad) values ('$IDCompetidor', '$cantidad')");
	
        if ($resultado) {
            return $this->db->insert_id;
        } else {
            return false;
        }
	}
    public function agregarCompetidorEquipo($IDCompetidor, $idEquipo) {
        $resultado = $this->db->query("INSERT into conforma (IDCompetidor, IDEquipo) values ('$IDCompetidor', '$idEquipo')");
    }

    public function modificarEquipo($idEquipo, $IDCompetidor, $cantidad) {
        $resultado = $this->db->query("UPDATE equipo SET Cantidad='$cantidad' WHERE IDCompetidor='$IDCompetidor'");
    }

	public function validarCompetidorExistente($idCompetidor) {
        $sql = "SELECT * FROM competidor WHERE IDCompetidor = '$idCompetidor'";
        $resultado = $this->db->query($sql);
        return $resultado->num_rows == 1;
    }
	public function validar_Coach_Existente($CI) {
        $sql = "SELECT * FROM coach WHERE CI = '$CI'";
        $resultado = $this->db->query($sql);
        if ($resultado->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function obtenerFechaNacimientoPorId($idCompetidor) {
        $sql = "SELECT fecha_nac FROM competidor WHERE IDCompetidor = '$idCompetidor'";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return new DateTime($row['fecha_nac']);
    }

    public function obtenerIdCompetidorPorCI($CI) {
        $sql = "SELECT IDCompetidor FROM competidor WHERE CI = '$CI'";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row['IDCompetidor'];
    }

    public function validarCompetidor($CI) {
        $sql = "SELECT * FROM competidor WHERE CI = '$CI'";
        $resultado = $this->db->query($sql);
        if ($resultado->num_rows > 0) {
            return true; // La CI del competidor existe
        } else {
            return false; // La CI del competidor no existe
        }
    }
    public function getDojoCompetidor($idCompetidor) {
        $sql = "SELECT dojo.NombreDojo
                FROM competidor
                JOIN dojo ON competidor.IDDojo = dojo.IDDojo
                WHERE competidor.IDCompetidor = '$idCompetidor'";
    
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
    
        if ($row) {
            return $row['NombreDojo'];
        } else {
            return false;
        }
    }
    public function getDojoCoach($CI) {
        $sql = "SELECT dojo.NombreDojo
                FROM coach
                JOIN dirige ON coach.CI = dirige.CI
                JOIN dojo ON dirige.IDDojo = dojo.IDDojo
                WHERE coach.CI = '$CI'";
    
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
    
        if ($row) {
            return $row['NombreDojo'];
        } else {
            return false;
        }
    }
       
}
?>