<?php
include "vendor/autoload.php";
use Goutte\Client;

 class Articulo{

    private $pdo;
    private $articulo_id;
    private $articulo_pdf;
    private $tema_id;
    private $idioma_id;
    private $fecha_subida;
    private $titulo;
    private $autor;
    private $doi;
    private $resumen;


    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }
   

    public function getArticuloId()
    {
        return $this->articulo_id;
    }

    public function setArticuloId($articulo_id)
    {
        $this->articulo_id = $articulo_id;
    }

    
    public function getArticuloPdf()
    {
        return $this->articulo_pdf;
    }

    
    public function setArticuloPdf($articulo_pdf)
    {
        $this->articulo_pdf = $articulo_pdf;
    }

   
    public function getTemaId()
    {
        return $this->tema_id;
    }

    
    public function setTemaId($tema_id)
    {
        $this->tema_id = $tema_id;
    }

    
    public function getIdiomaId()
    {
        return $this->idioma_id;
    }

   
    public function setIdiomaId($idioma_id)
    {
        $this->idioma_id = $idioma_id;
    }

   
    public function getFechaSubida()
    {
        return $this->fecha_subida;
    }

    
    public function setFechaSubida($fecha_subida)
    {
        $this->fecha_subida = $fecha_subida;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

 
    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    public function getDoi()
    {
        return $this->doi;
    }

    public function setDoi($doi)
    {
        $this->doi = $doi;
    }
    
    public function getResumen()
    {
        return $this->resumen;
    }

    public function setResumen($resumen)
    {
        $this->resumen = $resumen;
    }
    

    public function Cantidad_Articulos_Lista(){
 
    try{

        $consulta=$this->pdo->prepare("SELECT articulo_id,autor,titulo,fecha_subida,tema,nombre_idioma,articulo_pdf,doi,resumen FROM articulo A INNER JOIN tema T 
        ON A.tema_id=T.tema_id    INNER JOIN idioma I 
        ON I.idioma_id=A.idioma_id ORDER BY A.articulo_id desc");
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        $totalArticulo=$consulta->rowCount();
        $paginas = $totalArticulo/5;
        $paginas = ceil($paginas);
        return $paginas;

    }catch(Exception $e){
        die($e->getMessage());
    }

   }
   public function Cantidad_Articulos(){
 
    try{

        $consulta=$this->pdo->prepare("SELECT articulo_id,autor,titulo,fecha_subida,tema,nombre_idioma,articulo_pdf,doi,resumen FROM articulo A INNER JOIN tema T 
        ON A.tema_id=T.tema_id    INNER JOIN idioma I 
        ON I.idioma_id=A.idioma_id ORDER BY A.articulo_id desc");
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        $totalArticulo=$consulta->rowCount();
        
        return $totalArticulo;

    }catch(Exception $e){
        die($e->getMessage());
    }

   }
   public function Listar_Articulos($inciar){
 
    try{

        $consulta=$this->pdo->prepare("SELECT articulo_id,autor,titulo,fecha_subida,tema,nombre_idioma,articulo_pdf,doi,resumen FROM articulo A INNER JOIN tema T 
        ON A.tema_id=T.tema_id    INNER JOIN idioma I 
        ON I.idioma_id=A.idioma_id ORDER BY A.articulo_id desc LIMIT :iniciar,5");

        $consulta->bindParam(':iniciar', $inciar, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
    }

   }

   public function Listar_Articulos_Inicio(){
 
    try{

        $consulta=$this->pdo->prepare("SELECT articulo_id,autor,titulo,fecha_subida,tema,nombre_idioma,articulo_pdf,doi,resumen FROM articulo A INNER JOIN tema T 
        ON A.tema_id=T.tema_id    INNER JOIN idioma I 
        ON I.idioma_id=A.idioma_id ORDER BY A.articulo_id desc LIMIT 5");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
    }

   }

   public function Filtro($extra_query){
       try{

        $query ="SELECT articulo_id,autor,titulo,fecha_subida,tema,nombre_idioma,articulo_pdf,doi,resumen FROM articulo A INNER JOIN tema T 
        ON A.tema_id=T.tema_id    INNER JOIN idioma I 
        ON I.idioma_id=A.idioma_id ".$extra_query." ORDER BY A.articulo_id desc";
        
        $consulta=$this->pdo->prepare($query);
        $consulta->execute();

        $articulo_lista =[];
        while($articulo = $consulta->fetch(PDO::FETCH_ASSOC))
        {
            $articulo_lista[$articulo["articulo_id"]] = $articulo;
        }


        echo json_encode($articulo_lista);
        }catch(Exception $e){
            die($e->getMessage());
        }
   }

   public function Insertar(Articulo $a){
        try{
            $consulta="INSERT INTO articulo (articulo_pdf,tema_id,idioma_id,fecha_subida,titulo,autor,doi,resumen) VALUES (?,?,?,?,?,?,?,?)";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $a->getArticuloPdf(),
                        $a->getTemaId(),
                        $a->getIdiomaId(),
                        $a->getFechaSubida(),
                        $a->getTitulo(),
                        $a->getAutor(),
                        $a->getDoi(),
                        $a->getResumen()
                    ));

            print 1;
        }catch(Exception $e){
            die($e->getMessage());
        }
   }



    public function ValidarExistenciaDoi(Articulo $a){
        $cr = new Client();
        try{
            $doi = $a->getDoi();
            $doiCut = substr($doi, 16);
            $url = "https://search.scielo.org/?q=".$doiCut;
            $tema = $a->getTemaId();
            $cr_ = $cr->request("GET", $url);

            $idioma = $a->getIdiomaId();
            $codigo = $cr_->filter(".checkbox.my_selection")->attr('value');
            $codigo="#".$codigo."_".$a->getIdiomaId();


            $titulo = $cr_->filter(".item .line .title")->text();

            $autores = [];
            $cr_ ->filter(".line.authors .author")->each(function($node) use(&$autores){
                $autor = $node->filter(".author")->text();

                array_push($autores, [
                    "nombre" => $autor
                ]);
            });

            $cadenaAutor= "";
            for($i=0;$i<count($autores);$i++){
                $cadenaAutor = $cadenaAutor."<li>".$autores[$i]["nombre"]."</li>";
            }

            $cadenaAutor= "<ul>".$cadenaAutor."</ul>";

            $abstract = $cr_ ->filter($codigo)->text();



            $pdfarreglo = [];
            $cr_ ->filter(".line.versions .showTooltip")->each(function($node) use(&$idioma,&$pdfarreglo){
                
                $pdf = $node->filter(".showTooltip")->attr('href');
                $pdfvalor = $node->filter(".showTooltip")->text();
                
                if(stripos($pdf, "sci_pdf")!==false){

                    array_push($pdfarreglo, [
                        "enlace" => $pdf,
                        "lng" => $pdfvalor
                    ]);


                }
            });
            
            for($i=0;$i<count($pdfarreglo);$i++){
                if($pdfarreglo[$i]["lng"] == ucfirst($idioma)){
                    $enlacepdf= $pdfarreglo[$i]["enlace"];
                }
            }

            $data =[
                "titulo" =>$titulo,
                "autor" =>$cadenaAutor,
                "resumen" =>$abstract,
                "enlace" =>$enlacepdf,
                "idioma" =>$idioma,
                "tema" =>$tema,
                "doi" =>$doi
            ];
            print json_encode($data);


        }catch(Exception $e){
            $data = null; 
            print json_encode($data);
       }



    }



  
   public function Listar_Tema(){
        try{
            $consulta=$this->pdo->prepare("SELECT tema_id, tema FROM tema");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ); 

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Listar_Idioma(){
        try{
            $consulta=$this->pdo->prepare("SELECT idioma_id, nombre_idioma FROM idioma");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ); 

        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
 }


?>