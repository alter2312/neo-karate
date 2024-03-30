<?php


 class JuecesController{
    public function __construct(){
        require_once "models/juecesModel.php";
    }

    public function index(){
		$data["titulo"] = "Juez";
        require_once "../../views/jueces/jueces.php";	
    }




public function enviarPuntaje(){
  
    $puntaje = $_POST['puntaje'];
    $jueces = new Jueces_model();
    $jueces->insertar_puntaje($puntaje);
    echo "El puntaje fue enviado al administrador";
    $this->index();
}


}
?>