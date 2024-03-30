<?php

	
	class CompetidoresController {
		
		public function __construct(){
			require_once "models/CompetidoresModel.php";
			require_once "models/dojoModel.php";
		}
		
		public function index(){
			
			
			$competidores = new Competidores_model();
			$data["titulo"] = "Competidores";
			$data["competidores"] = $competidores->get_competidores();
			
			require_once "views/competidores/competidores.php";	
		}
		
		public function nuevo(){
			
			$data["titulo"] = "Competidores";
			require_once "views/competidores/competidores_nuevo.php";
		}
		
		public function guarda(){
			
			$CI = $_POST['CI'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$fecha_nac = $_POST['fecha_nac'];
			$genero = $_POST['genero'];
			$Dojo = $_POST['Dojo']; 
			$cantidad = 1 ;
			$competidores = new Competidores_model();
			$idDojo = $competidores->getIdDojo($Dojo);
			if ($competidores->validarCompetidor($CI)){
				echo "<div class='alerta'>El competidor ya esta registrado</div>";
				$this->nuevo();
				return;
			}
			else{
				$idcompetidor=$competidores->insertar($CI, $nombre, $apellido, $fecha_nac, $genero, $idDojo);
				$competidores->crearEquipo($idcompetidor,$cantidad);
			}
			$this->index();
		}

		public function modificar($idcompetidor){
			
			$competidores = new Competidores_model();
			
			$data["competidores"] = $competidores->get_competidor($idcompetidor);
			$data["idcompetidor"] = $idcompetidor;

			$data["titulo"] = "Competidores";
			require_once "views/competidores/competidores_modifica.php";
			
		}
		
		public function actualizar(){

				$idcompetidor = $_POST['idcompetidor'];
				$CI = $_POST['CI'];
				$nombre = $_POST['nombre'];
				$apellido = $_POST['apellido'];
				$fecha_nac = $_POST['fecha_nac'];
				$genero = $_POST['genero'];
				$Dojo = $_POST['Dojo'];
				$competidores = new Competidores_model();
				$idDojo = $competidores->getIdDojo($Dojo);
				$competidores->modificar($idcompetidor, $CI, $nombre, $apellido, $fecha_nac, $genero, $idDojo);
				$data["titulo"] = "Competidores";
				$this->index();
			}
		
			public function eliminar($idcompetidor){
			
			$competidores = new Competidores_model();
			$competidores->eliminar($idcompetidor);
			$data["titulo"] = "Competidores";
			$this->index();
		}	
	}

	?>	
		