<?php
    /* conexion Administrador va a tener todos los permisos tanto como para de alta como para dar de baja  */
            class ConectaDB{
                private $conex ; private static $instancia;
                private function __construct(){
                    $this->conex=new PDO("mysql:host=localhost; dbname=campus",'root','');
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
                 public function consultar_notas($username){
                    $consulta=$this->conex->prepare("select id,nota from notas where username=?");
                    $consulta->bindParam(1,$username);
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
                 }
                  public function consultarDatos($username){
                    $consulta=$this->conex->prepare("select * from usuarios where username=?");
                    $consulta->bindParam(1,$username);
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
                 } 
                 public function allDate($dni){
                    $consulta=$this->conex->prepare("select * from alumnos where dni=?");
                    $consulta->bindParam(1,$dni);
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
                 } 
                 public function insertarArchivo($nombre,$titulo,$archivo){
                    $consulta=$this->conex->prepare("insert into archivos(name,titulo,archivo)
                                                    values (?,?,?)");
                                $consulta->bindParam(1,$nombre);
                                $consulta->bindParam(2,$titulo);
                                $consulta->bindParam(3,$archivo);
                                $consulta ->execute();
             }

                 public function insertarArchivos($username,$nota){
                        $consulta=$this->conex->prepare("insert into notas(username,nota)
                                                        values (?,?)");
                                    $consulta->bindParam(1,$username);
                                    $consulta->bindParam(2,$nota);
                                    $consulta ->execute();
                 }
                 public function eliminarArchivos($id){
                    $consulta=$this->conex->prepare("delete from notas where id=?");
                    $consulta->bindParam(1,$id);
                    $consulta ->execute();
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
             public function campoDNI($usuario){
                $consulta=$this->conex->prepare("select dni from usuarios where username=?");
                $consulta->bindParam(1,$usuario);
                $consulta ->execute();
                if($consulta){
                    $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                    return $datos;
                }else{
                    return false;
                }
                
            }
            public function campoCurso($dni){
                $consulta=$this->conex->prepare("select curso from alumnos where dni=?");
                $consulta->bindParam(1,$dni);
                $consulta ->execute();
                if($consulta){
                    $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                    return $datos;
                }else{
                    return false;
                }
                
            }
            public function mostrar($curso){
                $consulta=$this->conex->prepare("select * from archivos_profesores where curso=?");
                $consulta->bindParam(1,$curso);
                $consulta ->execute();
                if($consulta){
                    $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                    return $datos;
                }else{
                    return false;
                }
            }
                 
}