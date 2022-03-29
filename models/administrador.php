<?php

class Administrador {
    private $pdo;

    private $administrador_id;
    private $nombre;
    private $apellidos;
    private $correo;
    private $contrasena;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    
    public function getAdministradorId()
    {
        return $this->administrador_id;
    }

    public function setAdministradorId($administrador_id)
    {
        $this->administrador_id = $administrador_id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }


    public function Validar(Administrador $ad){
        try{
            session_start();
            $consulta = "SELECT * FROM administrador WHERE correo=? AND contrasena=?";

            $resultado = $this->pdo->prepare($consulta);

            $resultado->execute(array(
                        $ad->getCorreo(),
                        $ad->getContrasena()
                    ));
            
            if($resultado->rowCount() >=1){
                $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['s_correoAdmin'] = $ad->getCorreo();
            }else{
                $_SESSION['s_correoAdmin'] = null;
                $data = null;
            }
            return print json_encode($data);

                    
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


}