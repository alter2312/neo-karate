<?php
	
	class Competidores_model {
		
		private $db;
		private $competidores;
	
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->competidores = array();
			
		}
		
		public function get_competidores()
		{
			$sql = "SELECT competidor.*, dojo.NombreDojo dojo FROM competidor join dojo  on competidor.IDDojo = dojo.IDDojo";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->competidores[] = $row;
			}
			return $this->competidores;
		}
		
		
		public function insertar($CI, $nombre, $apellido, $fecha_nac, $genero, $idDojo){
			
			$resultado = $this->db->query("INSERT INTO competidor (CI, Nombre, Apellido, Fecha_Nac, Genero, IDDojo) VALUES ('$CI', '$nombre', '$apellido', '$fecha_nac', '$genero', '$idDojo')");			if ($resultado) {
				return $this->db->insert_id;
			} else {
				return false;
			}
			
		}
		
		public function modificar($IDCompetidor, $CI, $nombre, $apellido, $fecha_nac, $genero, $idDojo){
			
		 $this->db->query("UPDATE competidor SET CI='$CI', Nombre='$nombre', Apellido='$apellido', Fecha_Nac='$fecha_nac', Genero='$genero', iDDojo=$idDojo WHERE IDCompetidor = '$IDCompetidor'");			
		}
		
		public function eliminar($IDCompetidor){
			$resultado1= $this->db->query("DELETE from conforma where IDCompetidor = $IDCompetidor");
			if($resultado1){
				$resultado2 = $this->db->query("DELETE from equipo where IDCompetidor = $IDCompetidor");	
				if($resultado2){
					$this->db->query("DELETE FROM competidor WHERE IDCompetidor = '$IDCompetidor'");
				}
			}
		}
		
		public function get_competidor($IDCompetidor)
		{
			$sql = "SELECT competidor.*, dojo.Nombr<Dojo dojo FROM competidor join dojo on competidor.IDDojo = dojo.IDDojo WHERE IDCompetidor='$IDCompetidor' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}

		public function getIdDojo($nombre){
			$sql = "SELECT IDDojo from dojo where NombreDojo='$nombre'";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();
			return $row["IDDojo"];
		}

		public function crearEquipo($IDCompetidor, $cantidad){
			 $this->db->query("INSERT into equipo (IDComeptidor, cantidad) values( $IDCompetidor,$cantidad)");
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
		public function obtenerIdCompetidorPorCI($CI) {
			$sql = "SELECT IDCompetidor FROM competidor WHERE CI = '$CI'";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();
			return $row['IDCompetidor'];
		}


	}

?>