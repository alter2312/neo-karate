<?php

	
	class CoachController {
		
		public function __construct(){
			require_once "models/coachModel.php";
		}
		
		public function index(){
			
			
			$coach = new Coach_model();
			$data["titulo"] = "Coach";
			$data["coach"] = $coach->get_coaches();
			
			
			require_once "views/coach/coach.php";	
		}
		
		public function nuevo(){
			
			$data["titulo"] = "coach";
			require_once "views/coach/coach_nuevo.php";
		}
		public function guarda(){
			$CI = $_POST['CI'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$telefono = $_POST['telefono'];
			$dojo = $_POST['dojo'];
			$coach = new Coach_model();
		
			$coachExistente = $coach->validar_Coach_Existente($CI);
			if ($coachExistente == true){
				echo "<div class='Alerta'>El coach ya existe</div>";
				$this->nuevo();
				return;
			}
		
			$dojoExistente = $coach->validarDojoExistente($dojo);
			if (!$dojoExistente) {
				echo "<div class='Alerta'>El Dojo no existe</div>";
				$this->nuevo();
				return; 
			}
		
			$idDojo = $coach->getIdDojo($dojo);
		
			$insertar = $coach->insertar_coach($CI, $nombre, $apellido, $telefono);
			$coachDojo = $coach->dirige($CI, $idDojo);
		
			$data["titulo"] = "coach";
			$this->index();
		}
		

		public function modificar($CI){
			
			$coach = new Coach_model();
			$data["coach"] = $coach->get_coach($CI);
			$data["CI"] = $CI;
			$data["titulo"] = "Coach";
			require_once "views/coach/coach_modificar.php";
			
		}
		
		public function actualizar(){

            $CI = $_POST['CI'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
		    $telefono = $_POST['telefono'];
            $dojo = $_POST['dojo'];
			$coach = new Coach_Model();
			$dojoExistente = $coach->validarDojoExistente($dojo);
			if (!$dojoExistente) {
				echo "<div class='Alerta'>El Dojo no existe</div>";
				$this->nuevo();
				return; 
			}
			$idDojo = $coach->getIdDojo($dojo);		
			$modificar = $coach->modificar_coach($CI, $nombre, $apellido, $telefono);
            $coachDojo = $coach ->modificar_dirige($CI,$idDojo);
			$data["titulo"] = "coach";
			$this->index();
        }
        
			public function eliminar($CI){
			$coach = new Coach_model();
			$eliminar= $coach->eliminar_coach($CI);
			$data["titulo"] = "Coach";
			$this->index();
		}	

public function formInscripcion() {
require_once "views/competidores/inscripcion_competidor.php";
}

public function formInscripcionGrupo(){
	require_once "views/competidores/inscripcion_equipo.php";
}


	public function inscripcion() {
    	$CI = $_POST['CI'];
    	$nombre = $_POST['nombre'];
    	$apellido = $_POST['apellido'];
    	$fecha_nac = $_POST['fecha_nac'];
    	$genero = $_POST['genero'];
    	$Dojo = $_POST['Dojo'];
    	$CiCoach = $_POST['CI-coach'];
 	    $nombreCoach = $_POST['nombre-coach'];
 	    $apellidoCoach = $_POST['apellido-coach'];
    	$telefonoCoach = $_POST['telefono-coach'];

    	$coach = new Coach_model();
    	$coachExistente = $coach->validar_Coach_Existente($CiCoach);	
		$dojoExistente = $coach->validarDojoExistente($Dojo);
	
		if($coach->validarCompetidor($CI) ==true){
			echo "<div class='alerta'>La cedula ya existe</div>"; 
			$this->formInscripcion();
			return;
		}
		if (!$dojoExistente) {
			echo "<div class='alerta'>El Dojo no existe</div>";
			$this->formInscripcion();
			return; 
		}
		if ($coachExistente === true) {
			$idDojo = $coach->getIdDojo($Dojo);
	
			$idCompetidor = $coach->insertar_competidor($CI, $nombre, $apellido, $fecha_nac, $genero, $idDojo);
	
			if ($idCompetidor) {
				$coach->crearEquipo($idCompetidor, 1);
		
				echo "<div class='exito'>La inscripción fue un éxito</div>";
			} else {
				echo "<p class='alerta'>Error al inscribir al competidor</p>";
			}
		} else {
			echo "<p class='alerta'>No tienes permisos para inscribir a competidores. Habla con el personal de la cuk si es necesario</p>";
		}
	
		$this->formInscripcion();
	}
	
	public function inscripcionEquipo() {
		$CICompetidor1 = $_POST['CICompetidor1'];
		$CICompetidor2 = $_POST['CICompetidor2'];
		$CICompetidor3 = $_POST['CICompetidor3'];
		$CICoach = $_POST['CICoach'];
	
		$coach = new Coach_model();
	
		// Validar si el coach existe
		if ($coach->validar_Coach_Existente($CICoach)) {
			$competidor1 = $coach->validarCompetidor($CICompetidor1);
			if ($coach->validarCompetidor($CICompetidor1) == true && $coach->validarCompetidor($CICompetidor2) == true && $coach->validarCompetidor($CICompetidor3) == true) {
				// Los competidores existen, verificamos si las CIs son únicas
				if ($this->validarCompetidoresUnicos($CICompetidor1, $CICompetidor2, $CICompetidor3) == true) {
					$idCompetidor1 = $coach->obtenerIdCompetidorPorCI($CICompetidor1);
					$idCompetidor2 = $coach->obtenerIdCompetidorPorCI($CICompetidor2);
					$idCompetidor3 = $coach->obtenerIdCompetidorPorCI($CICompetidor3);
					if($this->validarDojo($idCompetidor1,$idCompetidor2,$idCompetidor3,$CICoach)==true){

					
						// Agregar validación de rango de edad
						if ($this->validarCompetidores($idCompetidor1, $idCompetidor2, $idCompetidor3)) {
							$idEquipo = $coach->crearEquipo($idCompetidor1, 3); // Crea el equipo con el capitán (competidor2) y 2 miembros.
							$coach->agregarCompetidorEquipo($idCompetidor2, $idEquipo);
							$coach->agregarCompetidorEquipo($idCompetidor3, $idEquipo);
	
							echo "<div class='exito'>El equipo ha sido creado exitosamente.</div>";
						} else {
							echo "<div class='alerta'>Los competidores deben de tener el mismo rango de edad para inscribir el equipo</div>";
						}
					}else{
						echo "<div class='alerta'>Los competidores o el coach no pertenece al mismo dojo</div>";
					}
				} else {
					echo "<div class='alerta'>Alguna de las cedulas de los competidores son iguales.</div>";
				}
			} else {
				echo "<div class='alerta'>Error: Al menos una de las cedulas de los competidores no existe en la base de datos.</div>";
			}
		} else {
			echo "<div class='alerta'> El coach no esta registrado.</div>";
		}
		$this->formInscripcionGrupo();
	}
	
	public function validarCompetidores($idCompetidor1, $idCompetidor2, $idCompetidor3) {
		$edades = array(
			$this->calcularEdad($idCompetidor1),
			$this->calcularEdad($idCompetidor2),
			$this->calcularEdad($idCompetidor3)
		);
	
		if ($this->edadesEnMismoRango($edades)) {
			return true;
		}
	
		return false;
	}
	
	public function edadesEnMismoRango($edades) {
		$rangosEdad = array(
			array(12, 13),
			array(14, 15),
			array(16, 17),
			array(18)
		);
	
		foreach ($rangosEdad as $rango) {
			$enMismoRango = true;
			foreach ($edades as $edad) {
				if (!in_array($edad, $rango)) {
					$enMismoRango = false;
					break;
				}
			}
			if ($enMismoRango) {
				return true;
			}
		}
	
		return false;
	}
	
	public function calcularEdad($idCompetidor) {
		$coach = new Coach_model();
		$fechaNacimiento = $coach->obtenerFechaNacimientoPorId($idCompetidor);
		$hoy = new DateTime(); // Obtiene la fecha actual
		$fechaNac = $fechaNacimiento->format('Y-m-d');
	
		$fechaNac = new DateTime($fechaNac);
	
		$edad = $hoy->diff($fechaNac)->y;
		return $edad;
	}
	public function validarCompetidoresUnicos($CICompetidor1, $CICompetidor2, $CICompetidor3) {
		if($CICompetidor1 !== $CICompetidor2 && $CICompetidor1 !== $CICompetidor3 && $CICompetidor2 !== $CICompetidor3){
			return true;
		 }
		 else{
			false;
		 }
	}
	public function validarDojo($idCompetidor1,$idCompetidor2,$idCompetidor3,$CICoach){
		$coach = new Coach_model;
		$dojo1 = $coach->getDojoCompetidor($idCompetidor1); 
		$dojo2 = $coach->getDojoCompetidor($idCompetidor2); 
		$dojo3 = $coach->getDojoCompetidor($idCompetidor3); 
		$dojoCoach = $coach->getDojoCoach($CICoach);
		if($dojo1 == $dojo2 && $dojo2 == $dojo3 && $dojo3 == $dojoCoach){
			return true;
		}
		else{
			return false;
		}
	}
}	
	



	?>	
		