<?php
    /* conexion Administrador va a tener todos los permisos tanto como para de alta como para dar de baja  */
            class ConectaDB{
                private $conex ; private static $instancia;
                private function __construct(){
                    $this->conex=new PDO("mysql:host=localhost; dbname=campus",'administrador','1234');
                }
                public static function singleton(){ //método singleton que crea instancia sí no está creada
                    if (!isset(self::$instancia)) {
                        $miclase = __CLASS__;
                        self::$instancia = new $miclase;
                     }
                    return self::$instancia;
                }
                public function __clone(){  // Evita que el objeto se pueda clonar
                    trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
                 }
                 public function mostrarArchivos(){
                    $consulta=$this->conex->prepare("select * from archivos");
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
                 }
                 public function consultarID($nombre,$titulo,$archivo){
                    $consulta=$this->conex->prepare("select user_id from archivos where name=? and titulo=? and archivo=?");
                    $consulta->bindParam(1,$nombre);
                    $consulta->bindParam(2,$titulo);
                    $consulta->bindParam(3,$archivo);
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
                 }
                 public function consultarIDProfe($titulo,$archivo){
                    $consulta=$this->conex->prepare("select id_archivo from archivos_profesores where titulo=? and archivo=?");
                    $consulta->bindParam(1,$titulo);
                    $consulta->bindParam(2,$archivo);
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
                 }

                 public function eliminarFichero($id){
                    $consulta=$this->conex->prepare("delete from archivos where user_id=?");
                    $consulta->bindParam(1,$id);
                     $consulta->execute();
                 }
                 public function eliminarFicheroProfe($id){
                    $consulta=$this->conex->prepare("delete from archivos_profesores where id_archivo=?");
                    $consulta->bindParam(1,$id);
                     $consulta->execute();
                 }
                 public function recuperarPass($correo){
                    $consulta=$this->conex->prepare("select * from usuarios where correo=?");
                    $consulta->bindParam(1,$correo);
                    $consulta->execute();
                    if( $consulta->rowCount()>0){
                        return true;
                    }else{
                        return false;
                    }
                 }
                 public function passwordAleatorio($password,$dni){
                    $consulta=$this->conex->prepare("update usuarios set password =? where dni=?");
                    $consulta->bindParam(1,$password);
                    $consulta->bindParam(2,$dni);
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
                 }
            }
?>