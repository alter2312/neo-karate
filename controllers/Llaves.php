<?php

class LlavesController {
//    crear variable ronda para la clase
// private $IDRonda = [];
// private $IDLlave = [];
    public function __construct() {
        require_once "models/LlavesModel.php";
    }

    public function index() {
        $llave = new LlaveModel;
        $idTorneo = $llave->getIDTorneo();
        $data["title"] = "Torneo número $idTorneo";
        $cantidad = $llave->cantidadEquipos($idTorneo);
        require_once "views/llaves/llaves.php";
        return;
    }

    public function crearLlave() {
        $llaveModel = new LlaveModel();
        $idTorneo = $llaveModel->getIDTorneo();
        $categoria = $_POST['categoria'];
        $estado = "Inicializada";
    
        if ($categoria == "mayores") {
            $categoria = "18/mayores";
        }
        if(empty($categoria) ){
            echo "<div class='alerta'> debe de ingresar una de las categorias</div>";
            $this->index();
            return;
        }
        $cantEquipos = $llaveModel->cantEquiposCategoria($idTorneo, $categoria);
        $equiposEnCategoria = 0;
        $cantidadLlaves = $llaveModel->getCantidadLlaves($idTorneo);
        $limiteLlave = 0;
        foreach ($cantEquipos as $cat) {
            if ($cat["Categoria"] === $categoria) {
                $equiposEnCategoria = $cat["cantidad"];
            }
        }
    
        if ($equiposEnCategoria <= 1) {
            echo "<div class='alerta'>No hay competidores suficientes en la categoría " . $categoria . "</div>";
            $this->index();
            return;
        } elseif ($equiposEnCategoria == 2 || $equiposEnCategoria == 3) {
            $limiteLlave =1;
            if ($cantidadLlaves < $limiteLlave){
                $llaveIdRojo = $llaveModel->crearLlave($categoria, 'Aka');
                 $llaveModel->crearRonda($llaveIdRojo, $estado);
                $equipos = $llaveModel->getEquiposCategoriaTorneo($idTorneo, $categoria);
                foreach ($equipos as $values) {
                    $IDEquipo = $values;
                    $IDEquipo = intval($IDEquipo);
                    $llaveModel->agregarEquiposLlave($idTorneo, $llaveIdRojo, $IDEquipo);
                }
            }
            else{
                echo "la llave ya esta creada";
                $this->index();
                return;
            }
        } elseif ($equiposEnCategoria >= 4 && $equiposEnCategoria <= 10) {
            $limiteLlave =2;
            if ($cantidadLlaves < $limiteLlave){
                $llaveIdRojo = $llaveModel->crearLlave($categoria, 'Aka');
                $llaveIdAzul = $llaveModel->crearLlave($categoria, 'Ao');
                
                $llaveModel->crearRonda($llaveIdRojo, $estado);
                $llaveModel->crearRonda($llaveIdAzul, $estado);
                
                $equipos = $llaveModel->getEquiposCategoriaTorneo($idTorneo, $categoria);
                shuffle($equipos);
        
                $equiposDivididos = array_chunk($equipos, ceil($equiposEnCategoria / 2));
        
                foreach ($equiposDivididos[0] as $equipo) {
                    $IDEquipo = $equipo;
                    $IDEquipo = intval($IDEquipo);
                    $llaveModel->agregarEquiposLlave($idTorneo, $llaveIdRojo, $IDEquipo);
                }
        
                foreach ($equiposDivididos[1] as $equipo) {
                    $IDEquipo = $equipo;
                    $IDEquipo = intval($IDEquipo);
                    $llaveModel->agregarEquiposLlave($idTorneo, $llaveIdAzul, $IDEquipo);
                }
            }   else{
                echo "<div class=''>la llave ya esta creada </div>";
                $this->index();
                return;
            }
        } else {
            echo "<div class='alerta'>El sistema no puede soportar más de 10 competidores o equipos por ahora</div>";
            $this->index();
            return;
        }
    
        $this->mostrarEquipos($categoria);
    }

    public function ingresarCompetidorRonda() {
        $llaveModel = new llaveModel;
        $nombre_kata = $_POST["nombre_kata"];
        $num_kata = $_POST["num_kata"];
        $CIparticipante = $_POST["CIParticipante"];
        $idTorneo = $llaveModel->getIDTorneo();
        $IDEquipo = $llaveModel->getIDEquipo($CIparticipante, $idTorneo);
        $IDEquipo = intval($IDEquipo);
        $num_kata = intval($num_kata);
        $realiza=[];
        if ($llaveModel->validarKata($num_kata, $nombre_kata)) {
            
             $llaveModel->insertar_realiza($IDEquipo,$num_kata);  
             $realiza=$llaveModel->getRealiza();
               
        } else {
            echo "No existe el kata solicitado";
            require_once "views/administrador/empezarRonda.php";
        }

        return $realiza;
    }
    
    

    
    public function iniciarRonda() {
        $llaveModel = new LlaveModel;
        $realiza = $this->ingresarCompetidorRonda();
        $idLlave = $llaveModel->getIDLlave();
        $idRonda = $llaveModel->getIdRonda($idLlave);
        $llaveModel->asignarRonda($idRonda,$realiza);
        }
    

   
   
    

    
    public function ViewsEmpezarRondas($categoria){
        $llaveModel = new LlaveModel;
        $idTorneo = $llaveModel->getIDTorneo();
        $cantidad = $llaveModel->getCantidadCompetidoresEnLlave($idTorneo);
        $data["categoria"] =$categoria;
       var_dump($cantidad);
        if ($cantidad == 2 || $cantidad == 3){
            require_once "views/administrador/form_kata.php";
        }
        elseif($cantidad >= 4 && $cantidad <= 10){
            require_once "views/administrador/empezarRonda.php";
        }   
        else {
            echo "hubo algun error";
        }
    }
           

    public function mostrarEquipos($categoria) {
        $llave = new LlaveModel;
    
        $idTorneo = $llave->getIDTorneo();
        $tipo = $llave->getTipoTorneo($idTorneo);
        $data["categoria"] = $categoria;
        $data["grupo1"]=[];
        $data["grupo2"]=[];
        if ($tipo == "Individual") {
            $competidores = $llave->getCompetidoresEnLlave($idTorneo, $categoria);
            $cantidadLlaves = $llave->getCantidadLlaves($idTorneo, $categoria);
    var_dump($cantidadLlaves);
            if ($cantidadLlaves = 2) {
                $mitad = ceil(count($competidores) / 2);
                $arraydivido= array_chunk($competidores, $mitad);
                $data["grupo1"] = $arraydivido[0];
                $data["grupo2"] = $arraydivido[1];
            } else {
                $data["grupo1"] = $competidores;
                $data["grupo2"]=[];
            }
            require_once "views/llaves/lista_equipos.php";    
        } elseif ($tipo == "Grupal") {
            $data["grupo"] = $llave->getEquiposEnLlave($idTorneo, $idLlave);
        }
    }
    


    public function crearRondasFinales(){
        
    }
}

?>
