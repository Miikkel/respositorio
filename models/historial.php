<?php

class Historial{
    private $pdo;

    private $historial_id;
    private $paper_id;
    private $paper_pdf;
    private $fecha_subida;
    private $Avance;
    private $Notas;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }


    public function getHistorialId(){
        return $this->historial_id;
    }

    public function setHistorialId($historial_id){
        $this->historial_id = $historial_id;
    }

    public function getPaperId(){
        return $this->paper_id;
    }

    public function setPaperId($paper_id){
        $this->paper_id = $paper_id;
    }

    public function getPaperPdf(){
        return $this->paper_pdf;
    }

    public function setPaperPdf($paper_pdf){
        $this->paper_pdf = $paper_pdf;
    }

    public function getFechaSubida(){
        return $this->fecha_subida;
    }

    public function setFechaSubida($fecha_subida){
        $this->fecha_subida = $fecha_subida;
    }

    public function getAvance(){
        return $this->Avance;
    }

    public function setAvance($Avance){
        $this->Avance = $Avance;
    }

    public function getNotas() {
        return $this->Notas;
    }

    public function setNotas($Notas){
        $this->Notas = $Notas;
    }

    public function Listar_historial($id_paper){
        try{
            $consulta=$this->pdo->prepare("SELECT historial_id, paper_pdf AS historial_pdf, Avance AS historial_avance, Notas AS historial_notas ,fecha_subida AS historial_fecha from historial where paper_id=$id_paper ORDER BY historial_id DESC");
            $consulta->execute(array($id_paper));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
    
            }
    }

    public function ObtenerTitulo($id_paper){
        try{
            $consulta=$this->pdo->prepare("SELECT paper_titulo FROM paper WHERE paper_id=$id_paper");
            $consulta->execute(array($id_paper));
            return $consulta->fetch(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
    
            }
    }

    public function Insertar(Historial $h){
        try{
            $consulta="INSERT INTO historial (paper_id,paper_pdf,fecha_subida) VALUES (?,?,?)";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $h->getPaperId(),
                        $h->getPaperPdf(),
                        $h->getFechaSubida()
                    ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta="DELETE FROM historial WHERE historial_id=?;";
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

    public function Obtener_Estado($correo) {
        try{
            $consulta=$this->pdo->prepare("SELECT estado FROM usuario WHERE correo='$correo'");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}