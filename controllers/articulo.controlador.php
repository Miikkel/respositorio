<?php

require_once "models/articulo.php";

class ArticuloControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Articulo;
    }

    public function Inicio(){
       
        session_start();
        $sesionCorreo=null;
        if(isset($_SESSION["s_correo"])){
            $sesionCorreo = $_SESSION["s_correo"];
        };

        require_once "views/encabezadoWeb.php";
        require_once "views/articulo/inicio.php";
        require_once "views/footerWeb.php";
    }

    public function Nosotros(){
        session_start();
        $sesionCorreo=null;
        if(isset($_SESSION["s_correo"])){
            $sesionCorreo = $_SESSION["s_correo"];
        };
        require_once "views/encabezadoWeb.php";
        require_once "views/articulo/nosotros.php";
        require_once "views/footerWeb.php";
    }

    public function Repositorio(){
        session_start();

        $sesionCorreo=null;
        if(isset($_SESSION["s_correo"])){
            $sesionCorreo = $_SESSION["s_correo"];
        }else{
            header("Location:?c=loginUsuario&opcion=2");
        }
        
        if(!$_GET['pagina']){
            header("Location: ?c=articulo&a=Repositorio&pagina=1");
        }

        if($_GET['pagina']>$this->modelo->Cantidad_Articulos_Lista() || $_GET['pagina'] <= 0 ){
            header("Location: ?c=articulo&a=Repositorio&pagina=1");
        }
      

        $iniciar = ($_GET['pagina']-1)*5;
        require_once "views/encabezadoWeb.php";
        require_once "views/articulo/repositorio.php";
        require_once "views/footerWeb.php";

    }

    public function FormCrearArticulo(){
        session_start();
        if($_SESSION["s_correo"]===null){
            header("Location:?c=loginUsuario&opcion=3");
        }
        $sesionCorreo = $_SESSION["s_correo"];
        require_once "views/encabezadoWeb.php";
        require_once "views/articulo/formArticulo.php";
        require_once "views/footerWeb.php";

    }

    public function Identificar(){
        $a=new Articulo();

        if($_SERVER['REQUEST_METHOD'] ==='POST'){
           
                $a->setDoi($_POST['doi']);
                $a->setIdiomaId($_POST['idioma']);
                $a->setTemaId($_POST['tema']);

                $this->modelo->ValidarExistenciaDoi($a);
            
        }
    }

    public function Guardar(){
        $a=new Articulo();

        if($_SERVER['REQUEST_METHOD'] ==='POST'){
            
            $a->setTitulo($_POST['titulo']);
            $a->setAutor($_POST['autor']);
            $a->setResumen($_POST['resumen']);
            $a->setIdiomaId($_POST['idiomaId']);
            $a->setTemaId($_POST['temaId']);
            $a->setArticuloPdf($_POST['enlacePdf']);
            $a->setDoi($_POST['enlaceDoi']);

            date_default_timezone_set('UTC');
            date_default_timezone_set('America/Lima');
            $fecha  = date('Y-m-d');
            $a->setFechaSubida($fecha);

            $this->modelo->Insertar($a);


        }
    }

    public function Filtrar(){
        $query_values = $_POST;
        $extra_query ="WHERE Cancelled = 0 ";

        if($query_values){
            $extra_query.= " AND ";
            $values = [];
            $queries = [];

            foreach ($query_values as $field_name => $field_value){
                foreach ($field_value as $value){
                    $values[$field_name][] = " {$field_name} = '{$value}'";
                }
            }
            foreach ($values as $field_name => $field_values) {
                $queries[$field_name] = "(".implode(" OR ", $field_values).")";
            }
            $extra_query.= " ".implode(" AND ", $queries);
            
        }

        $this->modelo->Filtro($extra_query);
    }
}


?>