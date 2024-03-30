<?php
  class Dojo_model{
    private $db;
    private $dojos;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->dojos= array();
    }
    public function get_dojos()
    {
        $sql = "SELECT * FROM dojo";
        $resultado = $this->db->query($sql);
        while($row = $resultado->fetch_assoc())
        {
            $this->dojos[] = $row;
        }
        return $this->dojos;
    }

    public function insertar($nombreDojo, $escuela){
        
      $this->db->query("INSERT INTO dojo (NombreDojo, Escuela) VALUES ('$nombreDojo', '$escuela')");
         
        
    }
    
    public function modificar($idDojo, $nombreDojo, $escuela ){
        
       $this->db->query("UPDATE dojo SET NombreDojo='$nombreDojo', Escuela='$escuela' WHERE IDDojo= '$idDojo'");			
    }
    
    public function eliminar($idDojo){
        // Primero, obtenemos los IDCompetidor asociados al dojo
        $competidores = $this->db->query("SELECT IDCompetidor FROM competidor WHERE IDDojo = '$idDojo'");
    
        // Luego, para cada competidor, eliminamos las referencias en las tablas relacionadas
        while($row = $competidores->fetch_assoc()) {
            $idCompetidor = $row['IDCompetidor'];
            
            // Eliminar registros en las tablas relacionadas
            $this->db->query("DELETE FROM constituye WHERE IDEquipo IN (SELECT IDEquipo FROM equipo WHERE IDCompetidor = '$idCompetidor')");
            $this->db->query("DELETE FROM seencuentraen WHERE IDEquipo IN (SELECT IDEquipo FROM equipo WHERE IDCompetidor = '$idCompetidor')");
            $this->db->query("DELETE FROM componen WHERE IDEquipo IN (SELECT IDEquipo FROM equipo WHERE IDCompetidor = '$idCompetidor')");
            $this->db->query("DELETE FROM compite WHERE IDEquipo IN (SELECT IDEquipo FROM equipo WHERE IDCompetidor = '$idCompetidor')");
            $this->db->query("DELETE FROM realiza WHERE IDEquipo IN (SELECT IDEquipo FROM equipo WHERE IDCompetidor = '$idCompetidor')");
            $this->db->query("DELETE FROM puntaje WHERE IDEquipo IN (SELECT IDEquipo FROM equipo WHERE IDCompetidor = '$idCompetidor')");
            $this->db->query("DELETE FROM conforma WHERE IDEquipo IN (SELECT IDEquipo FROM equipo WHERE IDCompetidor = '$idCompetidor')");
            $this->db->query("DELETE FROM equipo WHERE IDCompetidor = '$idCompetidor'");
            $this->db->query("DELETE FROM conforma WHERE IDCompetidor = '$idCompetidor'");
        }
        // Ahora podemos eliminar los registros de la tabla dirige
        $this->db->query("DELETE from dirige where IDDojo ='$idDojo'");
        // Ahora podemos eliminar los competidores
        $this->db->query("DELETE FROM competidor WHERE IDDojo = '$idDojo'");
    
        // Finalmente, eliminar el registro en la tabla dojo
        $this->db->query("DELETE FROM dojo WHERE IDDojo = '$idDojo'");
    }
    
    

    
    public function get_dojo($idDojo)
    {
        $sql = "SELECT * FROM dojo WHERE IDDojo='$idDojo' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $row;
    }
}
?>
