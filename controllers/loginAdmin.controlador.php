<?php

require_once "models/administrador.php";

class LoginAdminControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Administrador;
    }

    public function Inicio(){
        session_start();
        $sesionCorreo=null;
        if(isset($_SESSION["s_correo"])){
            $sesionCorreo = $_SESSION["s_correo"];
        };
        
        require_once "views/encabezadoWeb.php";
        require_once "views/loginAdmin/index.php";
        require_once "views/footerWeb.php";
    }

    

    public function Acceder(){
        $ad = new Administrador();
        if($_SERVER['REQUEST_METHOD'] ==='POST'){
            $ad->setCorreo($_POST['correo']);
            $ad->setContrasena($_POST['contrasena']);

            $this->modelo->Validar($ad);
        }
    }

    public function CerrarSesion(){
       
        session_start();//variable de SESSION
        $_SESSION["s_correo"]=null;
        header("location:?c=loginAdmin");
    
        
    }
}