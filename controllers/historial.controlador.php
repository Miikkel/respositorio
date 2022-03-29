<?php 

require_once "models/historial.php";

class HistorialControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Historial;
    }

    public function Inicio(){
        session_start();

        if($_SESSION["s_correo"] === null){
        header("location:?c=loginUsuario&opcion=1");
        }

        $id_paper = $_GET['id'];
        require_once "views/encabezado.php";
        require_once "views/historial/index.php";
        require_once "views/historial/form.php";
        require_once "views/footer.php";
    }


    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        $id_paper = $_GET["id_paper"];
        header("location:?c=historial&id=$id_paper");
    }

    public function Guardar(){

        $h=new Historial();
        if($_SERVER['REQUEST_METHOD'] ==='POST'){
            if(is_uploaded_file($_FILES['fichero']['tmp_name'])) { 
                date_default_timezone_set('UTC');
                date_default_timezone_set('America/Lima'); //HORA DE LIMA
                $nombre= $_FILES['fichero']['name']; 
                $guardado= $_FILES['fichero']['tmp_name'];

                $fecha  = date('Y-m-d');
                $campo = explode(".", $nombre);
                $extension_ar = strtolower(end($campo));
                $extension = array('pdf');

                $id_paper=$_POST['id_paper'];

                if (in_array($extension_ar, $extension)) {
                    if(file_exists('historial_paper')){
                        if(move_uploaded_file($guardado, 'historial_paper/'.$fecha.$nombre)){
                                                        
                            header("location:?c=historial&id=$id_paper");
                        }

                        $ruta= "historial_paper/".$fecha.$nombre;

                        $h->setPaperId($_POST["id_paper"]);
                        $h->setPaperPdf($ruta);
                        $h->setFechaSubida($fecha);

                        $this->modelo->Insertar($h);
                    }
                }else{
                   
                    
                    header("location:?c=historial&id=$id_paper");
                }
            }
        }    
    }
}

?>