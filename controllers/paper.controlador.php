<?php

require_once "models/paper.php";

class PaperControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Paper;
    }

    public function Inicio(){

        session_start();

        if($_SESSION["s_correo"] === null){
        header("location:?c=loginUsuario&opcion=1");
        }

        require_once "views/encabezado.php";
        require_once "views/papers/index.php";
        require_once "views/footer.php";

    }
    public function ConfirmarCorreo(){

        session_start();

        if($_SESSION["s_correo"] === null){
        header("location:?c=loginUsuario&opcion=1");
        }


        require_once "views/encabezado.php";
        require_once "views/loginUsuario/confirmar_correo.php";
        require_once "views/footer.php";

    }
    

    public function FormCrear(){
        session_start();
        if($_SESSION["s_correo"] === null){
            header("location:?c=loginUsuario&opcion=1");
        }

        $p=new Paper();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
        }


        require_once "views/encabezado.php";
        require_once "views/papers/form.php";
        require_once "views/footer.php";
    }

    public function Guardar(){
        $p=new Paper();
        date_default_timezone_set('UTC');
        date_default_timezone_set('America/Lima');
        $p->setPaperId(intval($_POST['ID']));
        $p->setFechaSubida(date('Y-m-d'));
        $p->setTemaId($_POST['txt_tema']);
        $p->setPaperTitulo($_POST['txt_titulo']);


        session_start();
        $id=$this->modelo->ObtenerId($_SESSION["s_correo"]);
        $p->setUsuarioId($id->usuario_id);

        $p->getPaperId() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=paper");
        
        
    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=paper");
    }

    public function BienvenidoUsuario(){
        session_start();

        if($_SESSION["s_correo"] === null){
        header("location:?c=loginUsuario&opcion=1");
        }

        require_once "views/encabezado.php";
        require_once "views/loginAdmin/bienvenido.php";
        require_once "views/footer.php";
    }

    public function BienvenidoAdmin(){
        session_start();
        $sesionCorreo=null;
        if(isset($_SESSION["s_correo"])){
            $sesionCorreo = $_SESSION["s_correo"];
        };

        require_once "views/encabezadoAdmin.php";
        require_once "views/loginAdmin/bienvenido.php";
        require_once "views/footerAdmin.php";
    }

    public function BandejaAdmin(){

        require_once "views/encabezadoAdmin.php";
        require_once "views/papers/bandejaAdmin.php";
        require_once "views/footerAdmin.php";
     
    }

    public function BandejaSeguimiento(){
        require_once "views/encabezadoAdmin.php";
        require_once "views/papers/paperSeguimiento.php";
        require_once "views/footerAdmin.php";
    }
     
    public function HistorialSeguimiento(){
        $id_paper = $_GET['id'];
        require_once "views/encabezadoAdmin.php";
        require_once "views/papers/historialpaperSeguimiento.php";
        require_once "views/footerAdmin.php";
    }
    public function RevisarPaper(){
        $rutapdf=$_GET['pdf'];
        $id_historial=$_GET['hid'];
        $id_usuario=$_GET['uid'];
        $id_paper=$_GET['pid'];

        require_once "views/encabezadoAdmin.php";
        require_once "views/papers/revisarpaper.php";
        require_once "views/footerAdmin.php";
    }

    public function SeguimientoPaper(){
        $p = new Paper();

        $p->setPaperId($_POST['idPaper']);
        session_start();
        $id=$this->modelo->ObtenerIdAdmin($_SESSION["s_correoAdmin"]);
        $p->setAdministradorId($id->administrador_id);

        $this->modelo->SeguirPaper($p);

    }

    public function RevisionPaper(){
        require_once "models/paper.php";

        $p = new Paper();

        $datos=array(
            'notas'=>$_POST['texto'],
            'avance'=>$_POST['avance'],
            'idusuario'=>$_POST['id_usuario'],
            'idpaper'=>$_POST['id_paper'],
            'idhistorial'=>$_POST['id_historial'],
            
        );
          
        echo $p->RevisarPaper($datos);
    }
}