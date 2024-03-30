
<?php
class UsuariosController
{


    public function __construct()
    {
        
        require_once "models/usuariosModel.php";

    }
      public function index(){
			
			
			$usuarios = new Usuarios_model();
			$data["titulo"] = "Usuarios";
			$data["usuarios"] = $usuarios->get_usuarios();
			
			require_once "views/usuarios/usuario.php";	
		}
		
		public function nuevo(){
			
			$data["titulo"] = "Usuarios";
			require_once "views/usuarios/usuario_nuevo.php";
		}

        public function inicio(){
            require_once "views/inicio.php";
        }
        
        public function login() {
             require_once "views/usuarios/login.php";
        }
        public function inicioJuez($nombre){
            $_SESSION["nombre"]= $nombre;
            require_once "views/jueces/inicio_juez.php";
            
        }
        public function inicioJuez1(){
            require_once "views/jueces/inicio_juez1.php";
        }

        public function inicioAdmin($nombre){
            $_SESSION["nombre"]= $nombre;

            require_once "views/administrador/inicio_administrador.php";
        }

        public function inicioAdminUSer(){
            require_once "views/administrador_bd_karate/inicio_administrador_bd_karate.php";
        }
        public function validar() {
            
        
                if (empty($_POST["user"]) || empty($_POST["password"]) || empty($_POST["grupoUsuario"])) {
                    echo '<div class="error">Campos vacíos</div>';
                    require_once "views/usuarios/login.php";
                    
                } else {
                    session_start();
                    $usuario = new Usuarios_model();
                    $user = $_POST['user'];
                    $password = $_POST['password'];
                    $grupoUsuario = $_POST['grupoUsuario'];
              
                    $data = $usuario->get_validar($user, $password, $grupoUsuario);
        
                    if ($data) {
                        $_SESSION['grupoUsuario'] = $grupoUsuario;
        
                        switch ($grupoUsuario) {
                            case 'Juez':
                                $this->iniciojuez($user);
                                break;
                            case 'Juez1':
                                header("Location: Index.php?c=usuarios&a=inicioJuez1");
                                break;
                            case 'Administrador':
                                $this->inicioAdmin($user);
                                break;
                            case 'AdministradorBDKarate':
                                $this->inicioAdminUSer();
                                break;
                            default:
                                echo "Tipo de usuario no válido.";
                                $this->login();
                        }
                    } else {
                        echo '<div class="error">Usuario o contraseña incorrectos</div>';
                        require_once "views/usuarios/login.php";
                    }
                }
            }
        

            

        
     
    //  public function inicio(){
    //     require_once "views/usuarios/inicio.php";
    // }
  
		
		public function guarda(){
			
			$nombre = $_POST['nombre'];
			$contraseña = $_POST['contraseña'];
            $grupoUsuario = $_POST["grupoUsuario"];
			$usuarios = new Usuarios_model();
			$usuarios->insertar($nombre, $contraseña ,$grupoUsuario);
			$data["titulo"] = "Usuarios";
			$this->index();
			
		}

		public function modificar($idUsuario){
			
			$usuarios = new Usuarios_model();
			
			$data["usuarios"] = $usuarios->get_usuario($idUsuario);
			$data["idUsuario"] = $idUsuario;

			$data["titulo"] = "Usuarios";
			require_once "views/usuarios/usuario_modificar.php";
			
		}
		
		public function actualizar(){

				$idUsuario = $_POST['idUsuario'];
                $nombre = $_POST['nombre'];
                $grupoUsuario = $_POST["grupoUsuario"];
                $contraseña = $_POST['contraseña'];
				$usuarios = new Usuarios_model();
				$usuarios->modificar($idUsuario, $nombre, $contraseña, $grupoUsuario);
				$data["titulo"] = "Usuarios";
				$this->index();
			}
		
			public function eliminar($idUsuario){
			
			$usuarios = new Usuarios_model();
			$usuarios->eliminar($idUsuario);
			$data["titulo"] = "Usuarios";
			$this->index();
		}

        public function cerrarsession(){
            // Iniciar la sesión si no ha sido iniciada
            if (session_status() == PHP_SESSION_NONE) {


                
                session_start();
            }
        
            // Liberar las variables de sesión
            session_unset();
        
            // Destruir la sesión
            session_destroy();
        
            // Eliminar la cookie de sesión
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
        
            // Redirigir al usuario a la página de inicio
            require_once "views/inicio.php";
        }
        


    }
?>