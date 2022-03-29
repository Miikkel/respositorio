<?php

require_once "models/usuario.php";




class LoginUsuarioControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Usuario;
    }
     


    public function Inicio(){
        session_start();
        $sesionCorreo=null;
        if(isset($_SESSION["s_correo"])){
            $sesionCorreo = $_SESSION["s_correo"];
        };
        $opcion = $_GET['opcion'];
        require_once "views/encabezadoWeb.php";
        require_once "views/loginUsuario/index.php";
        require_once "views/footerWeb.php";
   
    }

    public function Registrar(){

        session_start();
        $sesionCorreo=null;
        if(isset($_SESSION["s_correo"])){
            $sesionCorreo = $_SESSION["s_correo"];
        };
        require_once "views/encabezadoWeb.php";
        require_once "views/loginUsuario/registro_usuario.php";
        require_once "views/footerWeb.php";
        require_once "validaciones/usuario.php";
    }
    public function ConfirmarCorreo(){
        session_start();
        $sesionCorreo=null;
        if(isset($_SESSION["s_correo"])){
            $sesionCorreo = $_SESSION["s_correo"];
        };
        require_once "views/encabezadoWeb.php";
        require_once "views/loginUsuario/confirmar_correo.php";
        require_once "views/footerWeb.php";
        require_once "validaciones/usuario.php";
    }
    public function Registrar_usuario(){

        $u=new usuario();
        if( isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo'])&& isset($_POST['escuela'])&& isset($_POST['contrasena']) ){
            
            $u->setNombre($_POST['nombre']);
            $u->setApellidos($_POST['apellido']);
            $u->setCorreo($_POST['correo']);
            $u->setEscuela($_POST['escuela']);
            $u->setContrasena(password_hash($_POST['contrasena'],PASSWORD_DEFAULT,['cost'=>10]));
            $aux=$this->modelo->Validar_correo($u);
            
            $u->setCodigo(rand(10000,99999));
          
            if($aux){//"Ya existe una cuenta afiliada a este correo"
                print 2;
            }
            else{

                if($this->modelo->EnviarCodigoCorreo($u)==true){
                    $this->modelo->Insertar_Usuario($u);
                }else{
                    echo "error";
                }                        
            } 
        }    

    }

    public function ValidarCodigo(){
        
        $u=new usuario();
        $u->setCorreo($_POST['correo']);
        $u->setCodigo($_POST['codigo']);
        
        $correo=$_POST['correo'];
       
        if($this->modelo->Validar_codigo($u)){
            $this->modelo->Modificar_Estado($correo);
        
            print 1; 
        }else{
            print 2; 
        }
    }




    public function Acceder(){
        $u = new Usuario();

        if($_SERVER['REQUEST_METHOD'] ==='POST'){
            $u->setCorreo($_POST['correo']);
            $u->setContrasena($_POST['contrasena']);

            $this->modelo->Validar($u);
        }
    }

    

    public function CerrarSesion(){
       
        session_start();//variable de SESSION
        $_SESSION["s_correo"]=null;
        header("location:?c=loginUsuario&opcion=1");
    
        
    }

}