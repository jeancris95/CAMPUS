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
                 //prueba
             public function creacionAdmin($name,$usuario,$pass,$roll){
                    $consulta=$this->conex->prepare("insert into usuarios(name,usuario,password,rol)values (?,?,?,?)");
                    $consulta->bindParam(1,$name);
                    $consulta->bindParam(2,$usuario);
                    $consulta->bindParam(3,$pass);
                    $consulta->bindParam(4,$roll);                    
                    if($consulta ->execute()){
                        return true;
                    }else{
                        return false;
                 }
                } 

                 public function existeUsuario($usuario,$rol){
                        $consulta = $this->conex->prepare("select password from usuarios where username=? and rol=?");
                        $consulta->bindParam(1,$usuario);
                        $consulta->bindParam(2,$rol);
                        $consulta->execute();
                        if($consulta){
                            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                            return $datos;
                        }else{
                            return false;
                        }  
                 }
                 public function id($usuario){
                    $consulta = $this->conex->prepare("select user_id from usuarios where username=? ");
                    $consulta->bindParam(1,$usuario);
                    $consulta->execute();
                    if($consulta){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }  
             }
             public function existeAlumno($usuario,$roll){
                $consulta = $this->conex->prepare("select password from usuarios where username=? and rol=? ");
                $consulta->bindParam(1,$usuario);
                $consulta->bindParam(2,$rol);
                $consulta->execute();
                if($consulta){
                    $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                    return $datos;
                }else{
                    return false;
                }  
         }
         public function existeProfesor($usuario,$roll){
            $consulta = $this->conex->prepare("select password from usuarios where username=? and rol=? ");
            $consulta->bindParam(1,$usuario);
            $consulta->bindParam(2,$rol);
            $consulta->execute();
            if($consulta){
                $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            }else{
                return false;
            }  
     }

        }