<?php
    /* conexion Administrador va a tener todos los permisos tanto como para de alta como para dar de baja  */
            class ConectaDB{
                private $conex ; private static $instancia;
                private function __construct(){
                    $this->conex=new PDO("mysql:host=localhost; dbname=alumnos",'root','');
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
                 public function insertarArchivos($nombre,$titulo,$archivo){
                        $consulta=$this->conex->prepare("insert into archivos(name,titulo,archivo)
                                                        values (?,?,?)");
                                    $consulta->bindParam(1,$nombre);
                                    $consulta->bindParam(2,$titulo);
                                    $consulta->bindParam(3,$archivo);
                                    $consulta ->execute();
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

                 public function eliminarFichero($id){
                    $consulta=$this->conex->prepare("delete from archivos where user_id=?");
                    $consulta->bindParam(1,$id);
                     $consulta->execute();
                 }
            }
?>