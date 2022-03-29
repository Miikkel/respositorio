<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

class Usuario {
    private $pdo;

    private $usuario_id;
    private $nombre;
    private $apellidos;
    private $correo;
    private $escuela;
    private $estado;
    private $contrasena;
    private $codigo;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }


    public function getUsuarioId() {
        return $this->usuario_id;
    }

    public function setUsuarioId($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getEscuela() {
        return $this->escuela;
    }

    public function setEscuela($escuela) {
        $this->escuela = $escuela;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }


    public function Validar(Usuario $u) {
        try{

            $consulta_VU = "SELECT contrasena FROM usuario WHERE correo=?";

            $consulta_VU = $this->pdo->prepare($consulta_VU);

            $consulta_VU->execute(array($u->getCorreo()));

            $pass=$consulta_VU->fetch(PDO::FETCH_ASSOC);
            
            $data = null;
            
            if(password_verify($u->getContrasena(), $pass['contrasena'])){
                session_start();

                $consulta="SELECT * FROM usuario WHERE correo=? AND contrasena=?";
                
                $resultado = $this->pdo->prepare($consulta);

                $resultado->execute(array(
                            $u->getCorreo(),
                            $pass['contrasena']
                        ));
                    
                if($resultado->rowCount() >= 1){
                    $data = $resultado->fetchAll(PDO::FETCH_ASSOC); 
                    $_SESSION["s_correo"] = $u->getCorreo();
                    
                }else{
                    $_SESSION["s_correo"] = null;
                    $data = null;
                    

                }
            }    


            
            
            return print json_encode($data);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Validar_correo(Usuario $u) {
    
        $consulta="select * from usuario
        where correo=?  ";
            
        $resultado = $this->pdo->prepare($consulta);

        $resultado->execute(array(
                    $u->getCorreo()

                ));
            if($resultado->rowCount() >= 1){
                return true;
            }
            else {
                return false;
            }
    }

    public function EnviarCodigoCorreo(Usuario $u){

        $mail = new PHPMailer(true);

        try{
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'unfvrepositorio@gmail.com';
            $mail->Password   = 'ABCcomida123';
            
            $mail->SMTPSecure = 'tls';
            
            $mail->Port       = 587;  
        
            
            $mail->setFrom('unfvrepositorio@gmail.com', 'JoseAntonio');
            $mail->addAddress($u->getCorreo());
            
            $mail->isHTML(true);   
            $mail->Subject = 'Gracias por registrarte';
            $mail->Body    = '
                <p>Ya casi estamos listos</p>  
                <p>tu codigo de verificacion es :</p>
                <h2>'.$u->getCodigo().'</h2>';
        
            $mail->send();
            
            
            return true;


        } catch (Exception $e) {
            return "ERROR AL ENVIAR EL MENSAJE: {$mail->ErrorInfo}";
        }
    }

    public function Insertar_Usuario(Usuario $u) {
 
        try{
            $consulta="insert into usuario (nombre,apellidos, correo, escuela, estado, contrasena,codigo) "
            . "values(?,?,?, ?,'INACTIVO',?,?)";
            $this->pdo->prepare($consulta)
            ->execute(array(
                $u->getNombre(),
                $u->getApellidos(),
                $u->getCorreo(),
                $u->getEscuela(),
                $u->getContrasena(),
                $u->getCodigo()
            ));
            print 1;  
        }catch(Exception $e){
            die($e->getMessage());
            print 2;  
        }



    }

    public function Validar_codigo(Usuario $u) {

        try{
            $consulta="select * from usuario
            where correo=? 
            and codigo=? ";
                
            $resultado = $this->pdo->prepare($consulta);
    
            $resultado->execute(array(
                        $u->getCorreo(),
                        $u->getCodigo()
                    ));
                if($resultado->rowCount() >= 1){
                    return true;
                }
                else {
                    return false;
                }
            }catch(Exception $e){
                die($e->getMessage());
    
            }
        
    }

    public function Modificar_Estado($correo) {

        try{
            $consulta="update usuario SET estado='ACTIVO' WHERE correo='$correo'";
            $resultado = $this->pdo->prepare($consulta);
            $resultado->execute();
            }catch(Exception $e){
                die($e->getMessage());
    
            }
        
    }

}