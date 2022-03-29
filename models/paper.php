<?php

class Paper{
    private $pdo;

    private $paper_id;
    private $paper_titulo;
    private $tema_id;
    private $fecha_subida;
    private $usuario_id;
    private $administrador_id;
    private $estado;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }


    public function getPaperId() :?int{
        return $this->paper_id;
    }

    public function setPaperId(int $paper_id){
        $this->paper_id = $paper_id;
    }

    public function getPaperTitulo()
    {
        return $this->paper_titulo;
    }

    public function setPaperTitulo($paper_titulo)
    {
        $this->paper_titulo = $paper_titulo;
    }

    public function getTemaId()
    {
        return $this->tema_id;
    }

    public function setTemaId($tema_id)
    {
        $this->tema_id = $tema_id;
    }

    public function getFechaSubida()
    {
        return $this->fecha_subida;
    }

    public function setFechaSubida($fecha_subida)
    {
        $this->fecha_subida = $fecha_subida;
    }

    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    public function getAdministradorId()
    {
        return $this->administrador_id;
    }

    public function setAdministradorId($administrador_id)
    {
        $this->administrador_id = $administrador_id;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function Cantidad(){
        try{
            $consulta=$this->pdo->prepare("SELECT SUM(paper_id) as Cantidadd FROM paper;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener_Estado($correo) {
        try{
            $consulta=$this->pdo->prepare("SELECT estado FROM usuario WHERE correo='$correo'");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function Listar_paper($id_usuario){
        try{
            $consulta=$this->pdo->prepare("SELECT
            paper.paper_id,
            paper.paper_titulo,
            (SELECT tema FROM tema WHERE tema_id = paper.tema_id) AS paper_tema,
            paper.fecha_subida AS paper_fecha,
            (SELECT CONCAT_WS(' ',nombre,apellidos) FROM administrador WHERE administrador_id=paper.administrador_id) AS paper_admin
            FROM paper WHERE paper.usuario_id=? order by paper.paper_id desc");
            $consulta->execute(array($id_usuario));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Listar_bandeja_admin(){
        try{
            $consulta=$this->pdo->prepare("SELECT 
                paper.paper_id,
                paper.paper_titulo,
                paper.tema_id,
                paper.fecha_subida,
                paper.usuario_id,
                paper.estado,
                paper.administrador_id,
                tema.tema,
                CONCAT_WS(' ',usuario.nombre,usuario.apellidos) AS estudiante
            FROM paper
            INNER JOIN usuario ON paper.usuario_id = usuario.usuario_id
            INNER JOIN tema	ON paper.tema_id = tema.tema_id
            WHERE paper.administrador_id IS NULL order by paper.paper_id desc");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Listar_paper_seguidos($id_admin){
        try{
            $consulta=$this->pdo->prepare("SELECT 
                paper.paper_id,
                paper.paper_titulo,
                paper.tema_id,
                paper.fecha_subida,
                paper.usuario_id,
                paper.estado,
                paper.administrador_id,
                tema.tema,
                CONCAT_WS(' ',usuario.nombre,usuario.apellidos) AS estudiante
            FROM paper
            INNER JOIN usuario ON paper.usuario_id = usuario.usuario_id
            INNER JOIN tema	ON paper.tema_id = tema.tema_id
            WHERE paper.administrador_id=? order by paper.paper_id desc");
            $consulta->execute(array($id_admin));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Listar_paper_versiones($id_paper){
        try{
            $consulta=$this->pdo->prepare("SELECT 
            p.paper_titulo,
            p.paper_id,
            p.usuario_id,
            h.historial_estado,
            h.fecha_subida, 
            h.paper_pdf, 
            h.historial_id
            FROM historial as h INNER JOIN 
            paper as p ON h.paper_id=p.paper_id 
            WHERE p.paper_id=?");
            $consulta->execute(array($id_paper));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM paper WHERE paper.paper_id=?");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Paper();
            $p->setPaperId($r->paper_id);
            $p->setFechaSubida($r->feha_subida);
            $p->setTemaId($r->tema_id);
            $p->setPaperTitulo($r->paper_titulo);

            return $p;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Insertar(Paper $p){
        try{
            $consulta="INSERT INTO paper (fecha_subida, tema_id, paper_titulo, usuario_id, estado)
            VALUES (?,?,?,?,'ESPERA')";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getFechaSubida(),
                        $p->getTemaId(),
                        $p->getPaperTitulo(),
                        $p->getUsuarioId()
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    
    public function Actualizar(Paper $p){
        try{
            $consulta="UPDATE paper SET
                fecha_subida=?,
                tema_id=?,
                paper_titulo=?
                WHERE paper_id=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getFechaSubida(),
                        $p->getTemaId(),
                        $p->getPaperTitulo(),
                        $p->getPaperId()
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta="DELETE FROM paper WHERE paper_id=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($id));
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function ObtenerId($correo){
        try{
        $consulta=$this->pdo->prepare("SELECT usuario_id FROM usuario WHERE correo='$correo'");
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function ObtenerIdAdmin($correo){
        try{
        $consulta=$this->pdo->prepare("SELECT administrador_id FROM administrador WHERE correo='$correo'");
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }



    public function SeguirPaper(Paper $p){
        try{
            
            $consulta="UPDATE paper 
            SET administrador_id=? WHERE paper_id=?";

            $resultado=$this->pdo->prepare($consulta)
                            ->execute(array(
                                $p->getAdministradorId(),
                                $p->getPaperId()
                            ));
            
                return 1;
           

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function RevisarPaper($datos){
        
        try{
            $sql1="UPDATE historial SET Notas=?,Avance=?,historial_estado='REVISADO' WHERE historial_id=?";

            $res1=$this->pdo->prepare($sql1)
                            ->execute(array($datos['notas'],
                                            $datos['avance'],
                                            $datos['idhistorial']
                                           ));
                                           
           if($datos['avance']=='100%'){
            $sql2="UPDATE paper SET estado='REVISADO' WHERE paper_id=?";
            $res2=$this->pdo->prepare($sql2)
                            ->execute(array($datos['idpaper']));
           } 
            
                            
            return 1;

        }catch(Exception $e){
            die($e->getMessage());
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
}